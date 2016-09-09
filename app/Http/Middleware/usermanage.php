<?php

namespace App\Http\Middleware;

use Closure;

use Redirect;

use Crypt;

use App\Http\Model\Admin;
class usermanage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session('username')){
            $result = Admin::where('edu_name',session('username'))->first();
            if (Crypt::decrypt(session('password')) == Crypt::decrypt($result->edu_pass)){

            }else{
                return redirect('admin/index')->with('msg','用户信息无效,请重新登录');
            }
        }else{
          return redirect('admin/index')->with('msg','用户信息已失效,请重新登陆');
        }
        return $next($request);
    }
}
