<?php

namespace App\Http\Middleware;

use Closure;
use DB;

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
        $cookiebool = \Cookie::get('admin');
        if($request->session()->has("admin")) {
             //经过中间件过滤 执行下一个请求
            return $next($request);
//			检查是否存在cookie
        } elseif(!empty($cookiebool)) {
//      	查询cookie用户存入session
			$namebool = DB::table('admin')->where("name", "=", $cookiebool)->first();
			unset($namebool->password);
			session(['admin' => $namebool]);
            return $next($request);
		} else {
            return redirect("/admins/login");
        }
    }
}
