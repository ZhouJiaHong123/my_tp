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
        echo $good->goodstype->tName;
//        return json($good);
    }
}