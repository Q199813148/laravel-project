<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Illuminate\Support\Facades\Cookie;
//导入模型类
use App\Model\Home\shows;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取轮播图信息
        $shows = \App\Model\Shows::where('status','=','1')->orderBy('id')->get();
//        $shows = DB::select("select * from shows where status = 1");
//        dd($shows);
        $i=1;
        return view("Home.Home.index",['shows'=>$shows,'i'=>$i]);
    }
    //注册页面
    public function regist()
    { 
    	return view("Home.Home.regist");
    }
    //执行注册
    public function register(Request $request)
    { 
   

    }

    //登录界面
    public function login()
    { 
    	return view("Home.Home.login");
    }

    //执行登录
    public function dologin(Request $request)
    { 
    	session_start();
    	//验证验证码
    	$request->flashOnly('name');
    	if($_SESSION['code'] != $request->input('code')){ 
    		return redirect('/login')->with('error','验证错误');
    	}

    	//获取输出信息并加密密码
    	$name = $request->input('name');
    	$password = $request->input('password');
    	$namebool = DB::table('users')->where("name",'=',$name)->first();
    	//$username=$namebool['name'];
    	//dd($username);
    	// dd($namebool->password);
    	if ($namebool->name == $name) {
            if (Hash::check($password, $namebool->password)) {
//              删除密码并存入session
                unset($namebool->password);
                session(['user' => $namebool]);
                
                return redirect('/')->with('success','登录成功');

    		} else {
            return redirect('/login')->with('error',"用户名或密码不正确");
        }
    	} else {
    		return redirect('/login')->with('error',"用户名或密码不正确");
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
