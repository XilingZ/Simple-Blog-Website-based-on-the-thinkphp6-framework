<?php

namespace app\model;
use think\Model;

//文件名不一定要和数据表名称一致
//class的名称和数据表的名称是一致的，之前在database.php那个文件设置了前缀tp_
/**
 * admin_id; admin_name; admin_pwd
 */
class Article extends Model{
    //固定表的名称，也是对应数据表的名称
    protected $name='article';
    protected $pk='article_id';   
    //取所有数据
    public function getAllArticle(){
        $db = Article::order('article_time','desc')->paginate(10);
        return $db;
    }

    //写入博文
    public function addArticle($title,$author,$content,$cate_id,$img_path,$time){
        $db = Article::create([
            'article_title'     =>      $title,
            'article_writer'    =>      $author,
            'article_time'      =>      $time,
            'cate_id'           =>      $cate_id,
            'article_content'   =>      $content,
            'article_img'       =>      $img_path
        ]);
        return $db;
    }
    
    //获取一条博文的数据
    public function getOneArticle($id){
        $db = Article::where('article_id', '=', $id)->find();
        return $db;
    }

    //修改博文
    public function editArticle($title,$author,$content,$cate_id,$time,$id){
        $db = Article::update([
            'article_title'     =>      $title,
            'article_writer'    =>      $author,
            'article_time'      =>      $time,
            'cate_id'           =>      $cate_id,
            'article_content'   =>      $content,
        ],['article_id' => $id]);
        return $db;
    }

    //删除博文
    public function delArticle($id){
        $db = Article::destroy($id);
        return $db;
    }

    //获取当前分类下的所有文章
    public function getCateArticle($cate_id,$limit=10){
        $db = Article::where('cate_id','=',$cate_id)->order('article_time', 'desc')->paginate($limit);
        return $db;
    }

    //读取首页的十条文章
    public function getLimitArticle($num){
        $db = Article::order('article_time','desc')->limit($num)->select();
        return $db;
    }
}