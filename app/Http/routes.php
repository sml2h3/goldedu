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
    //执行动作
        //登陆操作
    Route::post('login','Admin\UserController@login');
});
Route::group(['prefix'=>'admin','middleware'=>['admin.login','web']],function(){
    //集成了登陆的用户权限中间件
        //访问控制面板
    Route::get('dash','Admin\ViewController@dashview');
});