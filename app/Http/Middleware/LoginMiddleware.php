<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if($request->session()->has("admin")){
             //经过中间件过滤 执行下一个请求
            return $next($request);
        }else{
            //直接跳转到登录界面 redirect 跳转  /login 路由规则
            return redirect("/admins/login");
        }
    }
}
