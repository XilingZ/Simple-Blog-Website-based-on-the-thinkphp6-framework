<?php

namespace app\model;
use think\Model;

//文件名不一定要和数据表名称一致
//class的名称和数据表的名称是一致的，之前在database.php那个文件设置了前缀tp_
/**
 * admin_id; admin_name; admin_pwd
 */
class Admim extends Model{
    //固定表的名称，也是对应数据表的名称
    protected $name='admin';
    protected $pk='admin_id';   //主键 main key
    //取一条数据
    public function getOne($value,$filed='admin_name'){
        $db = Admim::where($filed,'=',$value)->find();
        return $db;
    }

    public function getAllAdmins(){
        $db = Admim::select();
        return $db;
    }

    public function admin_add($name,$pwd){
        $db = Admim::create([
            'admin_name'    =>  $name,
            'admin_pwd'     =>  $pwd
        ]);
        return $db;
    }

    public function admin_edit($pwd,$id){
        $db = Admim::update([
            'admin_pwd'     =>  $pwd
        ],['admin_id' => $id]);
        return $db;
    }

    public function admin_del($id){
        $db = Admim::destroy($id);
        return $db;
    }
}