<?php

namespace app\controller\model;

use think\Model;

class Goodstype extends Model
{
    protected $connection = 'taobao';
    protected $pk = 'tID';

//    反向关联
//    public function goods()
//    {
//       return $this->belongsTo(Goods::class,'tID');
//    }
}