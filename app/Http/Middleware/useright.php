<?php

namespace App\Http\Middleware;

use Closure;

class useright
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
                $array = array(
                    "result"=>"false",
                    "reason"=>"用户信息失效,请重新登录"
                );
                return json_encode($array,JSON_UNESCAPED_UNICODE);
            }
        }else{
            $array = array(
                "result"=>"false",
                "reason"=>"用户信息失效,请重新登录"
            );
            return json_encode($array,JSON_UNESCAPED_UNICODE);
        }
        return $next($request);
    }
}
