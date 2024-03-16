<?php

namespace app\controller;

use app\BaseController;
use app\controller\model\HelpTopic;
use app\controller\model\UserModel;
use http\Client\Curl\User;
use think\facade\Db;


class DataModel extends BaseController
{
//    初始化
//    public function initialize()
//    {
//        //Db类的数据库事件
//        Db::event('before_select',function ($query){
//            echo '执行了批量查询';
//        });
//        Db::event('after_update',function (){
//            echo '修改被执行';
//        });
//    }
    public function index()
    {
        UserModel::select();
//        Db::table('user')->select();
//        return json(UserModel::find(1));
    }
    public function model2()
    {
        return json(HelpTopic::select());
    }
    public function insert(){
//        $user = new UserModel();
//        $user->name = 4;
//        $user ->password = 4;
//        $user ->from = 4;
//        $user ->sex = 4;
//        $user->replace()->save();

//        $user->allowField(['name','password','sex','from'])->save([
//            'name' => 6,
//            'password' => 5,
//            'from' => 5,
//            'sex' => 5
//        ]);
        $user = UserModel::create([
            'name' =>12,
            'password' => 5,
            'from' => 5,
            'sex' => 12
        ],['name','password','from','sex'],true);
        return Db::getLastSql();
    }
    public function updata(){
        UserModel::update([
            'name' => 11,
            'from' => 111,
        ],['sex'=> 1]);

//        return UserModel::find(4);
//        $user = new UserModel();
//        $dataAll = [
//            [
//                'name' => 2,
//                'password' => 51,
//                'from' => 51,
//                'sex' => 51
//            ],[
//                'name' =>  2,
//                'password' => 5,
//                'from' => 5,
//                'sex' => 5
//            ]
//        ];
//        $user->saveAll($dataAll);
//        return DB::getLastSql();


    }
//    模型的数据查询
    public function select(){
//        $user = UserModel::find(14);
//        return json($user);
//        $user = UserModel::select([1,2,3]);
//        return json($user);

//        $user = UserModel::where('name',4)->value('from');
//        return $user;

        //对于数据是json类型的数据 查询信息要对 进行说明 json(['字段名'])  否者会视为string
        $user = Db::name('user')->where('name',14)->json(['list'])->select();
        return json($user);
    }
    public function field(){
//        UserModel::select();
//        Db::name('user')->select();
//        $user = UserModel::find(1);
//        echo $user->from;
//        echo $user['name'];
        $user = new UserModel();
        echo $user->getUserName();
    }
    public function getAttr()
    {
//        $user = UserModel::find(1);
//        echo $user->noting;
//        echo $user->getData('from');//getData()不会促发修改器
//        return json($user);

        // 动态的获取器

        $user = UserModel::find(1)->withAttr('from',function ($value){
            return $value+1000;
        });
        return json($user);

    }

    public function scope()
    {
//        $result = UserModel::scope('sex')->select();

//        $result = UserModel::sex()->select();
        //带参数写法
        //$result = UserModel::scope('password',5)->select();
//        $result = UserModel::password(5)->select();
        UserModel::withoutGlobalScope()->select(); //去除强制的范围查询
        Db::getLastSql();
//        return json($result);
    }

    public function search()
    {
        $result= UserModel::withSearch(['name','sex'],[
            'name'=>1,
            'sex'=>2,
            'order'=>'asc'
        ])->select();
        dump(Db::getLastSql());
        return json($result);
    }
    public function typec()
    {
        $user = UserModel::find(4);
        var_dump((bool)$user->name);
    }

    //json字段
    public function ins()
    {
        $data = [
            'name' => 1,
            'from'=>2,
            'sex' =>3,
            'password'=>4,
            'list' =>[
                'name' => 11,
                'from'=>21,
                'sex' =>31,
                'password'=>41
                ]
        ];

        //对于添加数组等形式不能直接添加 要对其进行json字段说明
        return Db::name('user')->json(['list'])->save($data);
    }

//    json数据用Db类 操作数据库 进行修改
    public function updata2()
    {
        // 对json类型数据进行修改 也要什么是json数据
//        $data['list'] = ['name'=> 99,'password'=>88,'from'=>77,'sex'=>66];
        //对string的json数据进行个别修改
        $data['list->name'] = 100;
        return Db::name('user')->where('name',14)->json(['list'])->save($data);
    }

//    json数据 用模型操作数据库 进行修改
    public function updata3()
    {
        //要在模型里 添加一个protected属性的$json 配置 protected $json = ['list']
        UserModel::create([
            'name' => 17,
            'from'=>2,
            'sex' =>3,
            'password'=>4,
            'list' =>[
                'name' => 11,
                'from'=>21,
                'sex' =>31,
                'password'=>41
            ]
        ]);
    }


    public function updata4()
    {
        $user = new UserModel();
        $user->name = 20;
        $user ->password = 4;
        $user ->from = 4;
        $user ->sex = 4;

        $list = new \stdClass();
        $user->replace()->save();
    }

    //软删除
    public function softDel()
    {
//        return UserModel::where('name', 4)->delete();
//        return UserModel::destroy(1);
//        UserModel::find(2)->delete();
//        $user = UserModel::select();

        //查看软删除的数据
//        $user = UserModel::withTrashed()->select();



//    return  Db::getLastSql();
//        return json($user);
    }


}