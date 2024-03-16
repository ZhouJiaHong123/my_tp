<?php

namespace app\controller;

use think\facade\Route;

class Address
{
    public function index()
    {
        return 'address/index';
    }
    public function details($id)
    {
        return '详情：id是'.$id;
    }
    public function search($id,$uid)
    {
        return '详情：id是'.$id.',uid是'.$uid;
    }
    public function url()
    {
        //通过控制器地址获取路由地址  如果没有着进行参数拼接
//        return url('address/details',['id'=>5]);
//        Route::rule('ds/:id','Address/details')->pattern(['id'=>'\d+']);
//        return url('ss',['id'=>33]);
    }
}