<?php

namespace app\model;
use think\Model;

/**
 * 数据表: tp_category （栏目分类信息表）
 */
class Category extends Model{
    protected $name='category';
    protected $pk='cate_id';

    //读取数据库所有数据
    public function getAllCategory(){
       $db = Category::order('cate_id','desc')->select();
       return $db;
    }

    //查询一条数据
    public function getOneCategory($value,$filet='cate_name'){
        //链式查询
        $db = Category::where($filet, '=', $value)->find();
        //在模型层判断分类是否已存在
        
        return $db;
    }

    //写入分类
    public function addCategory($cate_name){
        $db = Category::create(['cate_name'  => $cate_name]);
        return $db;
    }

    //删除分类
    public function categoryDel($id){
        $db = Category::destroy($id);
        return $db;
    }
 
    //修改分类
    public function categoryEdit($id,$name){
        $db = Category::update(
            ['cate_name' =>  $name],['cate_id' => $id]
        );
    }
}