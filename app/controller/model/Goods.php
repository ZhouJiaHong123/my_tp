<?php

namespace app\controller\model;

use think\Model;

class Goods extends Model
{
    protected $connection = 'taobao';
    protected $pk = 'gdID';
    public function goodstype()
    {
        return $this->hasOne(Goodstype::class,'tID');
    }
}