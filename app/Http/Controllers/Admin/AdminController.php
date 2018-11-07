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

		return redirect('/adminusers');
//		echo "this is admin home page";
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
		$request -> flashOnly('name');
		if($_SESSION['code'] != $request->input('code')) {
            return redirect('/admins/login')->with('error','验证码错误');
		}	
//		获取输入信息并加密密码
		$name = $request->input('name');
		$password =  $request->input('password');
		$namebool = DB::table('admin')->where("name", "=", $name)->first();
//		判断数据是否存在
		if($namebool) {
//			判断密码是否正确
			if (Hash::check($password, $namebool->password)) {
//				删除密码并存入session
				unset($namebool->password);
				session(['admin' => $namebool]);
//				存储七天自动登陆
				if(!empty($request->input('keep'))) {
					Cookie::queue('admin', $name, 10080);	
				}
	            return redirect('/admin')->with('success','登录成功');
			} 
            return redirect('/admins/login')->with('error','用户名或密码不正确');
        }else{
            return redirect('/admins/login')->with('error','用户名或密码不正确');
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
