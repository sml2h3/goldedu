<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Admin\CommonController;

use App\Http\Model\Admin;
use Crypt,Redirect;
use Illuminate\Support\Facades\Input;
use Searchy;
class UserController extends CommonController
{
    public function search(){
        $result = Searchy::qtn('qs_title', 'qs_name')->query('d')->getQuery()->simplePaginate(2);
        return json_encode($result,JSON_UNESCAPED_UNICODE);
    }
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
                $username = Input::get('username');
                $password = Input::get('password');
                $permission = Input::get('permission');
                $encode_pass = Crypt::encrypt($password);
                $info = array(
                    "edu_name"=>$username,
                    "edu_pass"=>$encode_pass
                );
                switch ($permission){
                    case '0':
                        //超级管理员
                        $info['edu_is_super'] = '1';
                        $info['edu_permission'] = "";
                        break;
                    case '1':
                        $info['edu_is_super'] = '0';
                        $info['edu_permission'] = '1';
                        break;
                    case '2':
                        $info['edu_is_super'] = '0';
                        $info['edu_permission'] = '2';
                        break;
                    default:
                        $array = array(
                            "result" => "0",
                            "reason" => "信息不完整"
                        );
                        return json_encode($array,JSON_UNESCAPED_SLASHES);
                }
                if ($this->user_info['is_super']=='1'||$this->user_info['permission']<$info['edu_permission']){
                    $already = Admin::where('edu_name',$info['edu_name'])->first();
                    if ($already != ""){
                        $array = array(
                            "result" => "0",
                            "reason" => "用户已经存在"
                        );
                        return json_encode($array,JSON_UNESCAPED_SLASHES);
                    }
                    $Id = Admin::insertGetId($info);
                    //只有超级用户管理权限或者满足当前权限值小于创建的权限值即可创建
                    if (is_numeric($Id)){
                        $array = array(
                            "result" => "1",
                            "reason" => $Id
                        );
                        return json_encode($array,JSON_UNESCAPED_SLASHES);
                    }else{
                        $array = array(
                            "result" => "0",
                            "reason" => "添加失败,请确保您的用户权限有权利创建此用户,或者发生系统故障,请与管理员联系"
                        );
                        return json_encode($array,JSON_UNESCAPED_SLASHES);
                    }
                }else{
                    $array = array(
                        "result" => "0",
                        "reason" => "添加失败,请确保您的用户权限有权利创建此用户,或者发生系统故障,请与管理员联系"
                    );
                    return json_encode($array,JSON_UNESCAPED_SLASHES);
                }
                break;
            case 'edit':

                break;
            case 'del':
                $Id = Input::get('Id');
                $result = Admin::where('Id',$Id)->first();
                if($this->user_info['is_super'] == '1'|| $this->user_info['permission']<$result->edu_permission){
                    $result = Admin::where('Id',$Id)->delete();
                    return $result;
                }else{
                    $array = array(
                        "result" => "0",
                        "reason" => "删除失败,权限不足"
                    );
                    return json_encode($array,JSON_UNESCAPED_SLASHES);
                }
                break;
        }
    }
}
