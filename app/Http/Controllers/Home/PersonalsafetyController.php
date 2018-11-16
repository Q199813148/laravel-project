<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//修改密码校验类
use App\Http\Requests\Personal\SafetyPass;
//修改手机校验类
use App\Http\Requests\Personal\SafetyPhone;
//修改邮箱校验类
use App\Http\Requests\Personal\SafetyEmail;

class PersonalsafetyController extends Controller
{
    /**
     * 个人中心安全设置首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//  	获取id
    	$id = session('user')->user_id;
//		获取用户表
    	$data = DB::table('users')->where('user_id','=',$id)->first();
//		获取用户详情表
    	$user = DB::table('user_info')->where('user_id','=',$id)->first();
//		获取密保信息
    	$encrypted = DB::table('encrypted')->where('user_id','=',$id)->first();
//		dd($encrypted);
//		引入页面
        return view('Home.Personal.safety',['data'=>$data,'user'=>$user,'encrypted'=>$encrypted]);
    }
	
//	修改密码页面
    public function safetypass()
	{
		return view('Home.personal.safetypass');
	}
//	执行修改密码
    public function dosafetypass(SafetyPass $request)
	{
//		获取密码
		$data['password'] = Hash::make($request->input('password'));
//		获取原始密码
		$pass = $request->input('plpassword');
//		获取id
		$id = session('user')->user_id;
//		获取数据库密码
		$password = DB::table('users')->where('user_id','=',$id)->value('password');
//		判断原始密码是否正确
        if (Hash::check($pass, $password)) {
//      	执行修改
			if(DB::table('users')->where('user_id','=',$id)->update($data)) {
				$data['title1'] = '修改密码';
				$data['title2'] = 'Password';
				$data['name'] = '重置密码';
				return view('Home.Personal.endsafetypass',['data'=>$data]);
			}else{
				return back()->with('error','修改失败，请稍后再试');
			}
		}else{
			return back()->with('error','密码错误');
		}
		
	}
	
    /**
     * 添加密保
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//  	判断该用户是否存在密保并执行响应
		$data = DB::table('encrypted')->where('user_id','=',session('user')->user_id)->first();
		if(!$data) {
	        return view('Home.Personal.safetyencrypted');
		}else{
			return back()->with('error','已存在密保');
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//  	获取问题及答案
        $data = $request->only('issue1','issue2','result1','result2');
//		获取id
    	$data['user_id'] = session('user')->user_id;
//		查询并判断用户是否存在密保
		$bool = DB::table('encrypted')->where('user_id','=',$data['user_id'])->first();
		if(!$bool) {
//			执行添加密保
			if(DB::table('encrypted')->insert($data)) {
				$datb['title1'] = '设置安全问题';
				$datb['title2'] = 'Set Safety Question';
				$datb['name'] = '设置安全问题';
				return view('Home.Personal.endsafetypass',['data'=>$datb]);
			}else{
				return back()->with('error','添加失败');
			}
		}else{
			return back()->with('error','密保已存在');
		}
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
//	密保校验
	public function verifyencrypted(Request $request)
	{
//		获取值
		$id = session('user')->user_id;
		$token = $request->input('token');
		$dbtoken = DB::table('encrypted')->where('user_id','=',$id)->value('token');
//		判断token值是否与数据库同步
		if($token == $dbtoken) {
//			获取该用户密保数据
			$data = DB::table('encrypted')->where('user_id','=',$id)->select('issue1','issue2')->first();
//			获取跳转路径
			$data->url = $request->input('url');
		    return view('Home.Personal.verifyencrypted',['data'=>$data]);
		}else{
			return redirect('/personalsafety')->with('error','非法操作');	
		}
	}
//	执行密保校验
	public function doverifyencrypted(Request $request)
	{
//		获取值
		$id = session('user')->user_id;
		$data = $request->only('result1','result2');
//		获取答案
		$result = DB::table('encrypted')->where('user_id','=',$id)->select('result1','result2')->first();
//		判断密保答案是否相同
		if($data['result1'] == $result->result1 && $data['result2'] == $result->result2) {
//			重置密保
			$token = rand(1,99999999);
			$data= DB::table('encrypted')->where('user_id','=',$id)->update(['token'=>$token]);
			$url = $request->input('url');
//			跳转回响应路径
			return redirect('/'.$url.'?token='.$token);
		}else{
			return back()->with('error','答案错误');
		}
		
		
	}
	
//	修改手机页面
    public function safetyphone(Request $request)
	{
//		获取值
		$id = session('user')->user_id;
		$token = $request->input('token');
		$dbtoken = DB::table('encrypted')->where('user_id','=',$id)->value('token');
//		判断token是否同步
		if(!$token == $dbtoken) {
//			token不同步 跳转至密保检验
//			重置token
			$token = rand(1,99999999);
			$data= DB::table('encrypted')->where('user_id','=',$id)->update(['token'=>$token]);
//			跳转
			return redirect('/verifyencrypted?url=safetyphone&token='.$token);
		}
//		token同步 引入修改页面
		return view('Home.personal.safetyphone');
	}
	
//	执行修改手机
    public function dosafetyphone(SafetyPhone $request)
	{
//		获取传输数据
		$id = session('user')->user_id;
		$data = $request->only("phone",'phcode');
//		dd($data);
	//  获取存储的手机验证码
    	$smsid = \Cookie::get('smsid');
//		获取传过来的手机验证码
		$yzm = $request->input('phcode');
//		判断
		if($yzm == $smsid) {
//			设置并修改随机token值
			$update['token'] = rand(1,99999999);
			$update['phone'] = $data['phone'];
			$up['phone'] = $data['phone'];
			DB::table('users')->where("user_id",'=',$id)->update($update);
			DB::table('user_info')->where("user_id",'=',$id)->update($up);
//			引入页面
			$datb['title1'] = '修改手机';
			$datb['title2'] = '';
			$datb['name'] = '修改手机';
			return view('Home.Personal.endsafetyedit',['data'=>$datb]);
		} else {
            return back()->with("error",'验证码错误');
		}
	}
	
//	修改密保
    public function safetyencrypted(Request $request)
    {
//  	获取值
		$id = session('user')->user_id;
		$token = $request->input('token');
		$dbtoken = DB::table('encrypted')->where('user_id','=',$id)->value('token');
//		判断token是否同步
		if(!$token == $dbtoken) {
//			token不同步 跳转至密保检验
//			重置token
			$token = rand(1,99999999);
			$data= DB::table('encrypted')->where('user_id','=',$id)->update(['token'=>$token]);
//			跳转
			return redirect('/verifyencrypted?url=safetyencrypted&token='.$token);
		}
//		token同步 引入修改页面
		$data = DB::table('encrypted')->where('user_id','=',$id)->first();
		return view('Home.Personal.safetyencryptededit',['data'=>$data]);
    }
//	执行修改密保
    public function dosafetyencrypted(Request $request)
    {
//        获取id
		$id = session('user')->user_id;
//		获取密保问题及答案
        $data = $request->only('issue1','issue2','result1','result2');
//		执行修改
		if(DB::table('encrypted')->where('user_id','=',$id)->update($data)) {
			$datb['title1'] = '修改密保';
			$datb['title2'] = '';
			$datb['name'] = '修改密保';
			return view('Home.Personal.endsafetyedit',['data'=>$datb]);
		}else{
			return back()->with('error','修改失败');
		}
    }


//	修改邮箱
    public function safetyemail(Request $request)
    {
//  	获取值
		$id = session('user')->user_id;
		$token = $request->input('token');
		$dbtoken = DB::table('encrypted')->where('user_id','=',$id)->value('token');
//		判断token是否同步
		if(!$token == $dbtoken) {
//			token不同步 跳转至密保检验
//			重置token
			$token = rand(1,99999999);
			$data= DB::table('encrypted')->where('user_id','=',$id)->update(['token'=>$token]);
//			跳转
			return redirect('/verifyencrypted?url=safetyemail&token='.$token);
		}
//		token同步 引入修改页面
		return view('Home.Personal.safetyemail');
    }
//	执行修改邮箱
    public function dosafetyemail(SafetyEmail $request)
    {
//        获取id
		$id = session('user')->user_id;
		dd($id);
//		获取密保问题及答案
        $data = $request->only('issue1','issue2','result1','result2');
//		执行修改
		if(DB::table('encrypted')->where('user_id','=',$id)->update($data)) {
			$datb['title1'] = '修改密保';
			$datb['title2'] = '';
			$datb['name'] = '修改密保';
			return view('Home.Personal.endsafetyedit',['data'=>$datb]);
		}else{
			return back()->with('error','修改失败');
		}
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
