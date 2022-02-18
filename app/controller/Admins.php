<?php
namespace app\controller;
use app\BaseController;
use app\middleware\Check;
use app\model\Admim;
use app\model\Info;
use app\model\Category;
use app\model\Article;

use think\facade\Session;
use think\facade\View;
use think\facade\Request;
use think\facade\Filesystem;
use think\facade\Validate;

/**
 * 这个文件是一个控制器（Controller）对应的是view文件夹的Admin文件夹，
 * 然后login这个函数对应的是login.html
 */
class Admins extends BaseController
{
    protected $middleware = [
        Check::class => ['except' => ['login']],
    ];

    //后台主页
    public function index(){
        View::assign('admin_name',Session::get('admin_name'));
        return View::fetch();
    }
    //后台登陆（依赖注入）
    public function login(Admim $admim){
        if(Request()->isPost()){
            //dump(input('post.name'));
            $db = $admim->getOne(input('post.name'));
            if(empty($db)){
                //数据等于空的时候null，管理员不存在
                return '管理员不存在！';
            }
            else if($db['admin_pwd'] != md5(input('post.pwd'))){
                //检查密码是否正确
                return '用户名或是密码不正确';
            }
            else{
                Session::set('admin_name',input('post.name'));
                return '登录成功';
            }
        }
        
        return View::fetch();
    }

    //网站基本信息设置
    public function setting(Info $info){
        //读取数据到页面，要先新建一个model的php文件，去链接数据库的info数据表
        $db = $info->getInfo();
        //把$db的值渲染到前端页面
        View::assign('info', $db);

        if (Request()->isPost()){
            $db = $info->edit(
                input('post.webname'),
                input('post.webdes'),
                input('post.wechat'),
                input('post.webkeyword'),
                input('post.qq'),
                input('post.email'),
                input('post.phone'),
                input('post.copyright')
            );
            return '更新成功';
        }

        return View::fetch();
    }

    //后台管理员列表
    public function admin_list(Admim $admim){
        //遍历数据库，查询多条数据
        $db = $admim -> getAllAdmins();
        View::assign('allAdmins',$db);
        if(Request()->isPost()){
            //添加之前要先判断，是否有已存在的管理员名称
            $is_exist = $admim->getOne(input('post.adminName'));
            if(!empty($is_exist['admin_id'])){
                return '该用户名已存在';
            }
            else{
                $bd = $admim->admin_add(input('post.adminName'),md5(input('post.password')));
                dump($db);
                if (empty($db['admin_id'])){
                    //没有添加成功
                    return '添加失败';
                }
                else{
                    return '添加成功';
                }
            }
        }
        return View::fetch();
    }

    //修改密码
    public function admin_edit(Admim $admim){
        $admin_id = input('get.admin_id');
        $db = $admim->getOne($admin_id,'admin_id');
        View::assign('admin_info', $db);

        if(Request()->isPost()){
            //对比原始密码是否正确
            $db = $admim->getOne(input('post.id'),'admin_id');
            if(md5(input('post.oldpwd')) != $db['admin_pwd']){
                return '原始密码不正确';
            }
            //修改密码
            else{
                $db = $admim->admin_edit(md5(input('post.newpwd')),input('post.id'));
                return '修改密码成功';
            }
        }
        return View::fetch();
    }

    //删除管理员
    public function admin_del(Admim $admim){
        $db = $admim->admin_del(input('admin_id'));
        if($db){
            //删除成功后跳转
            return redirect('admin_list');
        }
    }

    //添加分类
    public function category(Category $category){
        $db = $category->getAllCategory();
        View::assign('category',$db);

        if(Request()->isPost()){
            $db = $category->getOneCategory(input('post.categoryName'));
            if(!empty($db['cate_id'])){
                return '添加的分类已存在';
            }
            else{
                $db = $category->addCategory(input('post.categoryName'));
                return '添加分类成功';
            }
        }
        return View::fetch();
    }

    //修改分类
    public function category_edit(Category $category){
        $db = $category->getOneCategory(input('cate_id'),'cate_id');
        View::assign('cate',$db);
        //从页面接受新的分类名称过来
        if(Request()->isPost()){
            $db = $category->categoryEdit(input('post.cate_id'),input('post.cate_name'));
            return '修改分类成功';
        }
        return View::fetch();
    }

    //删除分类
    public function category_del(Category $category){
        $db = $category->categoryDel(input('cate_id'));
        return redirect('category');
    }

    //博客列表
    public function article(Article $article, Category $category){
        $db = $article->getAllArticle();
        $odb = $category->getAllCategory();
        View::assign('category',$odb);
        View::assign('articles',$db);
        return View::fetch();
    }

    //添加博文
    public function article_add(Category $category){
        //把分类遍历出来
        $odb = $category->getAllCategory();
        View::assign('category',$odb);
        return View::fetch();
    }

    //通过form那边传过来的数据
    public function upload(Article $article){
        $file = Request::file('file');  //获取图片信息
        //上传文件到服务器
        //$path = Filesystem::putFile('topic',$file);//获取到图片存储的路径
        $title = input('post.article_title');
        $author = input('post.author');
        $content = input('post.text1');
        $category = input('post.category');
        //dump($content);
        if(mb_strlen($title)<2){
            echo "<script>alert('标题最少要2位')</script>";
        }
        else if(mb_strlen($author)<1){
            echo "<script>alert('作者不能为空')</script>";
        }
        else if(mb_strlen($content)<5){
            echo "<script>alert('内容最少要5位')</script>";
        }
        else{
            //上传文件到服务器
            $validate = Validate::rule([
                'image'     =>  'file|fileExt:png,jpg,gif,jpeg'
            ]);//这个是我们编写的规则(我们的规则)

            $is_img = $validate->check([
                'image'     =>  $file
            ]);//这里才是真正的验证(验证我们的规则)
            
            if($is_img){
                $path = Filesystem::disk('public')->putFile('topic',$file);//获取到图片存储的路径
                //添加到数据库
                $time = time();
                $db = $article->addArticle($title,$author,$content,$category,$path,$time);
                if(empty($db)){
                    echo "<script>alert('添加博文失败')</script>";
                }
                else{
                    echo "<script>alert('添加博文成功'); window.location.href='article';</script>";
                }
            }
            else{
                dump($validate->getError());
            }
        }
    }

    //博文修改
    public function article_edit(Category $category, Article $article){
        $odb = $category->getAllCategory();
        View::assign('category',$odb);
        $db = $article->getOneArticle(input('article_id'));
        View::assign('article',$db);
        return View::fetch();
    }

    //通过form那边传过来的修改后的数据，不包括图片
    public function edit(Article $article){
        $title = input('post.article_title');
        $author = input('post.author');
        $content = input('post.text1');
        $category = input('post.category');
        $article_id = input('post.article_id');
        dump($article_id);
        if(mb_strlen($title)<2){
            echo "<script>alert('标题最少要2位')</script>";
        }
        else if(mb_strlen($author)<1){
            echo "<script>alert('作者不能为空')</script>";
        }
        else if(mb_strlen($content)<5){
            echo "<script>alert('内容最少要5位')</script>";
        }
        else{
            //添加到数据库
            $time = time();
            $db = $article->editArticle($title,$author,$content,$category,$time,$article_id);
            if(empty($db)){
                echo "<script>alert('修改博文失败')</script>";
            }
            else{
                echo "<script>alert('修改博文成功'); window.location.href='article';</script>";
            }
        }
    }

    //博文删除
    public function article_del(Article $article){
        $article_id = input('get.article_id');
        $db = $article->delArticle($article_id);
        if(empty($db)){
            echo "<script>alert('删除失败');history.back();</script>";
        }
        else{
            echo "<script>alert('删除成功');window.location.href='article';</script>";
        }
    }

    //退出登录
    public function signOut(){
        Session::delete('admin_name');
        echo "<script>alert('退出后台成功');window.location.href='login';</script>";
    }
}