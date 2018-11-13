<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class HomeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // $request  请求报文 请求对象
    public function handle($request, Closure $next)
    {
        //检测是否具有用户登录的session信息
        if($request->session()->has("user")) {
             //经过中间件过滤 执行下一个请求
            return $next($request);
        } else {
//      	未登录跳转登陆页面
            return redirect("/login");
        }
    }
}
