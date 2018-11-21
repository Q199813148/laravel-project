<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$time = date('Y-m-d H-i-s',time()-86400*7);
    	$times = date('Y-m-d H-i-s',time()-86400*14);
    	$timey = date('Y-m-d H-i-s',time()-86400*30);
		$orders = DB::table('orders')
		->where('time','>',$time)
		->count();
		$orderss = DB::table('orders')
		->where('time','>',$times)
		->where('time','<',$time)
		->count();
		$ordersy = DB::table('orders')
		->where('time','>',$timey)
		->count();
		if($orders){
			$orderer = round(($orders-$orderss)/$orders*100);
		}else{
			$orderer = 0;
		}
		$num = round(DB::table('orders')
		->where('time','>',$time)
		->where('status','>=',1)
		->sum('goods_money'));
		$numy = round(DB::table('orders')
		->where('time','>',$timey)
		->where('status','>=',1)
		->sum('goods_money'));
		$nums = DB::table('orders')
		->where('time','>',$times)
		->where('time','<',$time)
		->where('status','>=',1)
		->sum('goods_money');
		if($num){
			$numer = round(($num-$nums)/$num*100);
		}else{
			$numer = 0;
		}
		$endorders = DB::table('orders')
		->where('time','>',$time)
		->where('status','>=',3)
		->count();
		$endordersy = DB::table('orders')
		->where('time','>',$timey)
		->where('status','>=',3)
		->count();
		$endorderss = DB::table('orders')
		->where('time','<',$time)
		->where('time','>',$times)
		->where('status','>=',3)
		->count();
		if($endorders){
			$endorderer = round(($endorders-$endorderss)/$endorders*100);
		}else{
			$endorderer = 0;
		}
		return view("Admin.Admin.index",['orders'=>$orders,'ordersy'=>$ordersy,'orderer'=>$orderer,'endorders'=>$endorders,'endordersy'=>$endordersy,'endorderer'=>$endorderer,'num'=>$num,'numy'=>$numy,'numer'=>$numer]);
    }
    /**
     * 登陆界面
     *
     */
	public function login()
	{
		return view("Admin.Admin.login");
	}
	
    /**
     * 执行登陆
     *
     */
     
	public function dologin(Request $request)
	{
		session_start();
//		验证验证码
//		将name存入闪存
		$request -> flashOnly('name');
		if($_SESSION['code'] != $request->input('code')) {
            return redirect('/admins/login')->with('error','　*验证码错误');
		}
//		获取输入信息并加密密码
		$name = $request->input('name');
		$password =  $request->input('password');
		$namebool = DB::table('admin')->where("name", "=", $name)->first();
//		判断数据是否存在
		if($namebool) {
	//		判断是否被禁用
	    	if($namebool->status == 0) {
	        	return redirect("/admins/login")->with('error','　*您已被禁用');
	    	}
//			判断密码是否正确
			if (Hash::check($password, $namebool->password)) {

//				删除密码并存入session
				unset($namebool->password);
				session(['admin' => $namebool]);
				
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
				
//				存储七天自动登陆
				if(!empty($request->input('keep'))) {
					Cookie::queue('admin', $name, 10080);	
				}
	            return redirect('/admin')->with('success','登录成功');
			} 
            return redirect('/admins/login')->with('error','　*用户名或密码不正确');
        } else {
            return redirect('/admins/login')->with('error','　*用户名或密码不正确');
		}
	}
	
    /**
     * 退出登录
     *
     */
     
	public function exit(Request $request)
	{
		$cookie = Cookie::queue('admin', 'end', -1);
		$session = $request->session()->pull('admin');
		if($cookie && $session) {
			return redirect('/admins/login');
		}else{
			return redirect('/admin');
		}
		
		
	}
		
	    /**
	     * Show the form for creating a new resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	    public function create()
	    {
	        //
	    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
