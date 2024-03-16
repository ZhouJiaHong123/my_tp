<?php

namespace app\controller;

use app\BaseController;

class test extends BaseController
{
    public function index(){
        return "获取方法名".$this->request->action().',当前的实际路径'.$this->app->getBasePath();
    }
    public function outarray(){
        $data = ['a' => 1 ,'b'=>2, 'c'=>3];
        halt('中断输出');
        return json($data);
    }
}