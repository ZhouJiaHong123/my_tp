<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think/<name>', function ($name) {
    return 'hello,ThinkPHP6!'.$name;
});

Route::get('hello/:name', 'index/hello');

//Route::rule('ds/:id','Address/details','get')->pattern(['id'=>'\d+']);
//参数的另一个写法
//Route::rule('ds-:id','Address/details','get')->pattern(['id'=>'\d+']);
//Route::rule('ds-<id>','Address/details','get')->pattern(['id'=>'\d+']);
Route::rule('ds/<id>','Address/details','get')->pattern(['id'=>'\d+']);


//Route::rule('ds/:id/:uid','Address/search','get')->pattern(['id'=>'\d+','uid'=>'\d+']);

//动态控制器  变量可用 占位符: 变量写在路径里 用 : or <> 包裹
//Route::rule('hi/:id/:name','Hello:name/index','get');
Route::rule('hi/<id>/<name>','Hello:name/index','get');