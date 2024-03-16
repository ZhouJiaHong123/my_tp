<?php

namespace app\controller\model;

use think\Model;
//开启软删除
//use SoftDelete;
use think\model\concern\SoftDelete;


class UserModel extends Model
{
    protected $connection = 'mysql';//设置连接的配置的模式
    //设置连接的表名，默认是数据表名 改 为模型名（蛇形->大驼峰）
    //设置前缀需要改设置模型名称
    protected $name = 'user';
    protected $pk = 'name';//设置主键 便于 find() 查找
    protected $table ='user';//    切换数据库


    protected $json = ['list'];//模型操作数据是string 的json数据的字段
    //设置字段信息 模型的字段设置
    protected $schema = [
        'name'=>'int',
        'from'=>'int',
        'sex'=>'int',
        'password'=>'int',
        'list' => 'varchar'
    ];
    //设置只读字段
//    protected $readonly = ['name'];
    /* public function getUserName(){
        $obj = $this->find(1);
        return $obj->getAttr('name');
     }

    //设置字段的获取器  格式为getFieldAttr() 当控制器获取 Field字段时会自动调用  $value是控制器调用的返回值
    public function getFromAttr($value,$data)
    {
        dump($data);
        echo $value.'模型的修改器';
        $arr = [1=>'中国',2=>'日本',3=>'韩国',4=>'朝鲜'];
        echo $arr[$value];
    }
    // 虚拟字段
    public function getNotingAttr($value,$data)
    {
        $arr = [1=>'中国',2=>'日本',3=>'韩国',4=>'朝鲜'];
        dump($data);
        return $arr[$data['from']];
    }

    //sex 修改器
    public function setSexAttr($value)
    {
        return $value+2000;
    }
*/

    //范围查询，在模型里 格式scopeFiled
    //自动格式 Model::scope('field')  Model::field()
    public function scopeSex($query)
    {
        $query->where('sex',4)
                ->field('name,from,sex,password')
                ->limit(3);
    }

    public function scopePassword($query,$value)
    {
        $query->where('password','like','%'.$value.'%');
    }

    //强制范围查询  调用数据必须会调用的
//    protected $globalScope = ['name'];
//    public  function scopeName($query)
//    {
//        $query->where('name','>',1);
//    }

    public function searchNameAttr($query,$value,$data)
    {
        $query->where('name','like','%'.$value.'%');
//        if (isset($data['order'])){
//           $query->order($data['order']);
//    }
    }
    public function searchSexAttr($query,$value,$data)
    {
        $query->where('sex','>',$value);
    }

    //模型的数据库事件
//    protected static function onAfterRead()
//    {
//        echo '查询了';
//    }//查询时，自动触发
//
//    protected static function onBeforeUpdate()
//    {
//        echo '准备修改.......';
//    }//修改前自动触发
//    protected static function onAfterUpdate()
//    {
//        echo '已经修改完成！';
//    }//修改后自动触发

//    protected static function init()
//    {
//        parent::init(); // TODO: Change the autogenerated stub
//        echo '初始化';
//    }
}