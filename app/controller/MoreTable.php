<?php

namespace app\controller;

use app\controller\model\Goods;
use app\controller\model\Goodstype;

class MoreTable
{
    public function index()
    {
//        return json(Goodstype::select());
        $good = Goods::find(5);
        echo $good;
        echo $good->goodstype->tName;
//        return json($good->goodstype);
//        return json($good);
    }
    public function index2()  //数据表反向关联
    {
        $gtype = Goodstype::find(1);
        return json($gtype->goods);
    }
    public function index3() //关联表进行操作(修改)
    {
        $goods = Goods::find(1);
        $goods->goodstype->save(['tName'=>'服饰']);
    }
    public function index4() //关联表进行操作(新增)  ---没作用（.Y.)
    {
        $goods = Goods::find(2);
        $goods->goodstype()->save(['tName'=>'零食']);
    }
    public function index5()
    {
        $goods = Goods::hasWhere('goodstype',['tID'=>'3'])->find();
        return json($goods);
    }
}
