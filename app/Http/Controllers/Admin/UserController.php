<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Admin\CommonController;

use App\Http\Model\Admin;
use Crypt,Redirect;
use Illuminate\Support\Facades\Input;
class UserController extends CommonController
{
    private $user_info = array();
    public function __construct()
    {
        $result = Admin::where('edu_name',session('username'))->first();
        if ($result){

            $this->user_info = array(
                'username' => $result->edu_name,
                'password' => $result->edu_pass,
                'is_super' => $result->edu_is_super,
                'permission' => $result ->edu_permission,
                'login_time' => $result ->edu_login_time,
                'login_num' => $result ->edu_login_num
            );
        }else{
            session(['username'=>'','password'=>'']);
            return redirect('admin/index')->with('msg','用户状态失效,请重新登陆');
        }
    }
    //执行动作
        //登陆
    public function login(){
        if (Input::all()){
            $user = Input::get('username');
            $pass = Input::get('password');
            if ($user||$pass){
                //由于加密后的数据非唯一性,所以此处先进行数据库取出来的密码解密
                $result = Admin::where('edu_name',$user)->first();
                if ($result){
                    //解密密码
                    $decode_pass = Crypt::decrypt($result->edu_pass);
                    if ($decode_pass === $pass){
                        //登录成功,将用户信息存入session
                        session(['username'=>$user,'password'=>$result->edu_pass]);
                        //这里需要根据权限获取menu列表

                        //获取menu列表结束
                        return redirect('admin/dash');
                    }else{
                        return redirect('admin/index')->with('msg','账号或者密码错误');
                    }
                }else{
                    return redirect('admin/index')->with('msg','账号不存在');
                }
            }else{
                return redirect('admin/index')->with('msg','请填写用户名或密码');
            }
        }else{
            return redirect('admin/index')->with('msg','请填写用户名、密码或验证码');
        }
    }
    public function userAction($action){
        switch ($action){
            case 'add':
                return $this->user_info['username'];
                break;
        }
    }
}
