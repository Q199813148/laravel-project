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
		$namebool = DB::table('admin')->where("name", "=", $cookiebool)->first();

        if($request->session()->has("admin")) {
        	//用访问模块的控制器和方法 权限列表 对比
			//获取访问控制器的方法
			//获取访问模块方法名
			$action=$request->route()->getActionMethod();
			//获取访问模块控制器的名字
			$actions=explode('\\', \Route::current()->getActionName());
			$modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
			$func=explode('@', $actions[count($actions)-1]);
			//控制器名字
			$controller=$func[0];
			$actionName=$func[1];
//			 echo $controller.":".$action;
			//获取权限信息
			$nodelist=session('nodelist');
			//和权限列表做对比
//			dd($nodelist);
			if(empty($nodelist[$controller]) || !in_array($action,$nodelist[$controller])){
				// return redi rect("/admin")->with('error',"您没有权限访问该模块,请联系超级管理员");
			}
             //经过中间件过滤 执行下一个请求
            return $next($request);
//			检查是否存在cookie
        } elseif(!empty($cookiebool)) {
			//获取用户的所有权限列表信息
			$list = DB::table('role_node')
			->where('role_id','=',$namebool->level)
			->join('node','node.id','=','role_node.node_id')
			->where('node.status','=',1)
			->get();
//				 dd($list);
			//2.初始化权限信息
			//把后台首页权限写入到权限信息列表里
			$nodelist['AdminController'][]="index";
			//遍历写入其他权限
			foreach($list as $v){
				$nodelist[$v->m_name][]=$v->a_name;
					//如果有create 添加store方法
				if($v->a_name=="create"){
					$nodelist[$v->m_name][]="store";
				}
				//如果有edit 方法 添加update方法
				if($v->a_name=="edit"){
					$nodelist[$v->m_name][]="update";
				}
			}
			//将权限信息存入session
			session(['nodelist'=>$nodelist]);
//      	查询cookie用户存入session
			unset($namebool->password);
			session(['admin' => $namebool]);
            return $next($request);
//			未登陆 跳转登陆页面
		} else {
            return redirect("/admins/login");
        }
    }
}
