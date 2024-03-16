<?php

namespace app\controller;
use app\controller\model\UserModel;
use think\facade\Db;


class DataTest
{
    public function index(){
//        $user = Db::table('user')->select();
//        dump($user);
//        $user = Db::table('user')->where('name',2)->find();
//        错误的时候返回异常
//        $user = Db::table('user')->where('name',2)->findOrFail();
//       $user = Db::table('user')->column('name','from');

//        游标查询
//        Db::connect('demo')->name('user')->chunk(2,function($users){
//            foreach ($users as $user){
//                dump($user);
//            }
//            echo 1;
//        });

//        $users =  Db::connect('demo')->table('user')->cursor();
//        foreach ($users as $user){
//            dump($user);
//        }
        $user = Db::connect('demo')->table('user')->where('name',1)->order('from','desc');
        dump($user);
//        return Db::getLastSql();
//        return json($user);
    }
//    public function demo()
//    {
//        $info = Db::connect('mysql')->table('db')->select();
//        return json($info);
//
//    }
    public function getUser(){
        $user = UserModel::select();
        return json($user);
    }
    public function linkup(){
//        $user = Db::name('user')->where('name = 1')->select();
//        $user = Db::connect('demo')->name('user')->where('Host = "localhost" AND Select_priv = "N" ')->select();
//        $user = Db::connect('demo')->name('user')->where( 'Select_priv = :Select_priv' ,['Select_priv' => 'N'])->select();
//        $user = Db::table('user') -> fieldRaw('password  as aa,name') -> select();
//        $user = Db::table('user') -> fieldRaw('password  as aa,name,SUM(password)') -> select();
//        $user = Db::table('user') -> field(['name','from' => 'as'])-> select();
//        $user = Db::table('user')->field(true)->select();
        $user = Db::table('user')->withoutField('name')->select();
        return Db::getLastSql();
//        return json($user);
    }
    public function insert(){
        $data = [
            'name'=> 1,

            'sex' =>4,
            'from' => 2
        ];
        Db::name('user')->field('name,sex,from')->insert($data);
        return json(Db::name('user')->select());

    }
    public function linkDowm()
    {
//        $user = Db::table('user')->limit(2,3)->select();
//        $user = Db::table('user')->page(2 ,2)->select();
//        $user = Db::name('user')->order(['name'=>'desc','from'=>'desc'])->select();
//        $user = Db::name('user')->order( "name",'desc')->select();
//        $user = Db::name('user')->field('name,SUM(name)')->group('name,password')->select();
        $user = Db::name('user')->field('name,SUM(name)')->group('name')->having('SUM(name)>4')->select();
        return json($user);
    }
    public function adv(){
//        $user = Db::table('user')
//            ->where('name|from','like','%1%')
//            ->where('password&sex','>',2)
//            ->select();

//        $user = Db::table('user')
//            ->where([
//                ['name','>',1],
//                ['sex','>',2],
//                ['from','exp',Db::raw(">=2")]
//            ])
//            ->select();

        $map = [
                ['name','>',1],
                ['sex','>',2],
                ['from','exp',Db::raw(">=2")]
            ];
        $map2 = [
            ['name','like','%1%']
        ];
//        $user = Db::name('user')
//            ->where([$map]) //在$map 套一层[]就可以将前面部分作为一个整体
//            ->where('password',24)
//            ->select();

        $user = Db::name('user')->whereOr([$map,$map2])->select();
//        return Db::getLastSql();
        return json($user);
    }
    public function trans()
    {
        Db::transaction(function (){
            Db::name('user')->where('name','=',2)->save(['sex'=>Db::raw("sex - 3")]);
            Db::name('user')->where('name',12)->save(['sex'=>Db::raw('sex +3')]);

        });
    }
    public function collection(){
        $user = Db::name('user')->select();
//         数据集查询
//        dump($user->toArray());
        $user->pop();
//        dump($user->whereIn('name',[1,2]));
        dump($user);
    }

}