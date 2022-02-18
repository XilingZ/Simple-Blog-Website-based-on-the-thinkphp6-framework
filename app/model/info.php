<?php

namespace app\model;
use think\Model;

/**
 * 数据表: tp_info （包括站点基本信息）
 */
class Info extends Model{
    protected $name='info';
    protected $pk='owner_id';

    //读取数据库第一行的数据
    public function getInfo(){
       $db = Info::find(1);
       return $db;
    }

    public function edit($webname,$webdes,$wechat,$webkeyword,$qq,$email,$phone,$copyright){
        $db = Info::update([
            'webname'       =>      $webname,
            'webdes'        =>      $webdes,
            'wechat'        =>      $wechat,
            'webkeyword'    =>      $webkeyword,
            'qq'            =>      $qq,
            'email'         =>      $email,
            'phone'         =>      $phone,
            'copyright'     =>      $copyright,
            ],['owner_id' => '1']);
        return $db;
    }
    
}