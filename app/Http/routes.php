<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'],function(){
    //访问页面
        //访问登陆页面
    Route::get('index',function(){
        return view('admin.index');
    });
//    Route::get('test','Admin\UserController@test');
    //执行动作
        //登陆操作
    Route::post('login','Admin\UserController@login');
});
Route::group(['prefix'=>'admin','middleware'=>['admin.login','web']],function(){
    //集成了登陆的用户权限中间件,用于页面的跳转访问
        //访问控制面板
    Route::get('dash','Admin\ViewController@dashview');
    Route::get('user','Admin\ViewController@userview');
    Route::get('nques','Admin\ViewController@newquesView');
    Route::get('output','Admin\ViewController@outputview');
});
Route::group(['prefix'=>'admin','middleware'=>['admin.user']],function(){
    //集成了登录的用户访问的权限,用于api的接口,返回值为json格式
        //用户操作
    Route::post('user/{action}',"Admin\UserController@userAction");
        //题目相关
            //添加题目
    Route::post('ques/{action}','Admin\QuesController@quesAction');
});