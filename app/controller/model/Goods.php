<?php

namespace app\controller\model;

use think\Model;

class Goods extends Model
{
    protected $connection = 'taobao';
    protected $pk = 'gdID';

//    public function goodstype1()//关联副表 ->正向
//    {
//        //hasOne('模型','外键')! 用此方法在模型 关联
////        return $this->hasOne('Goodstype','tID');
//        return $this->hasOne(Goodstype::class,'tID');
//    }
}