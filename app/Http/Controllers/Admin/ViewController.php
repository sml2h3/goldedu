<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Admin\CommonController;

use App\Http\Model\Admin;

use Illuminate\Support\Facades\Input;
use TomLingham\Searchy\Facades\Searchy;
class ViewController extends CommonController
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
    //访问页面
        //访问控制面板
    public function dashview(){
        $info = array();
        $info['user'] = $this->user_info;
        if (Input::get('seek')){
            $result = Searchy::qtn('qs_title', 'qs_name')->query(Input::get('seek'))->getQuery()->simplePaginate(15);
            $info['result'] = $result;
            $info['seek'] = Input::get('seek');
        }
        return view('admin.dash',$info);
    }
    public function newquesView(){
        $info = array();
        $info['user'] = $this->user_info;
        return view('admin.newques',$info);
    }
    public function userview(){
        $result = Admin::simplePaginate(15);
        $info = array();
        $info['list'] = $result;
        $info['user'] = $this->user_info;
        return view('admin.user',$info);
    }
    public function outputview(){
        $info = array();
        $info['user'] = $this->user_info;
        return view('admin.output',$info);
    }

}
