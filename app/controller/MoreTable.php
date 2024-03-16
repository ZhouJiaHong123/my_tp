<?php

namespace app\controller;

use app\controller\model\Goods;
use app\controller\model\Goodstype;

class MoreTable
{
    public function index()
    {
//        return json(Goodstype::select());
        $good = Goods::find(4);
//        echo $good->goodstype->tName;
        return json($good->goodstype1);
//        return json($good);
    }
    public function index2()  //数据表反向关联
    {
        $gtype = Goodstype::find(1);
        return json($gtype->goods);
    }
}
