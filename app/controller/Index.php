<?php
namespace app\controller;
use app\BaseController;

use app\model\Category;
use app\model\Article;

use think\facade\View;
use think\facade\Db;

class Index extends BaseController
{
    //前台首页
    public function index(Category $category, Article $article){
        //遍历所有的分类
        $db = $category->getAllCategory();
        View::assign('category',$db);

        //遍历六篇的文章
        $db = $article->getLimitArticle(6);
        View::assign('article',$db);

        //遍历十篇篇的文章
        $db = $article->getLimitArticle(10);
        View::assign('ten',$db);

        //遍历三篇的文章
        $db = $article->getLimitArticle(3);
        View::assign('three',$db);

        return View::fetch();
    }

    //前台分类列表页
    public function list(Category $category, Article $article){
        $db = $category->getAllCategory();
        View::assign("category",$db);
        
        //获取当前分类的信息
        $cate_id = input('get.cate_id');
        $db = $category->getOneCategory($cate_id,'cate_id');
        View::assign('one_cate',$db);

        //总行数    总共有多少页
        $db = Db::query("select * from tp_article where `cate_id`=$cate_id");
        $total = count($db);
        $limit = 3;
        $total_page = $total/$limit;
        $total_page = ceil($total_page);
        View::assign('total', $total_page);

        //获取当前是第几页
        $page=input('page');
        View::assign('page',$page);

        //下一页    上一页
        $next_page = $page+1;
        if($next_page<1){
            $next_page = 1;
        }else if($next_page>$total_page){
            $next_page = $total_page;
        }
        View::assign('next_page', $next_page);
        $pre_page = $page-1;
        if($pre_page<1){
            $pre_page = 1;
        }else if($pre_page>$total_page){
            $pre_page = $total_page;
        }
        View::assign('pre_page', $pre_page);

        //获取属于当前分类的所有文章
        $db = $article->getCateArticle($cate_id,$limit);
        View::assign('cate_article',$db);

        //遍历十篇篇的文章
        $db = $article->getLimitArticle(10);
        View::assign('ten',$db);

        //遍历三篇的文章
        $db = $article->getLimitArticle(3);
        View::assign('three',$db);

        return View::fetch();
    }

    //前台文章详情页
    public function article(Category $category, Article $article){
        $db = $category->getAllCategory();
        View::assign('category',$db);

        //查询当前文章的数据库信息
        $db = $article->getOneArticle(input('get.article_id'));
        View::assign('article',$db);

        //遍历十篇篇的文章
        $db = $article->getLimitArticle(10);
        View::assign('ten',$db);

        //遍历三篇的文章
        $db = $article->getLimitArticle(3);
        View::assign('three',$db);

        return View::fetch();
    }

}
