<?php 
namespace app\controller;
use think\facade\Db;

class Database
{
    public function index()## 测试数据库连接
    {
        // 获取数据库(tp_test)表(tp_student)中所有数据
        $allData = Db::table('tp_admin') -> select();

        // 输出查看结果
        return json($allData);
    }
}