<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//修改密码校验类
use App\Http\Requests\Personal\SafetyPass;

class PersonalsafetyController extends Controller
{
    /**
     * 个人中心安全设置首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$id = session('user')->user_id;
    	$data = DB::table('users')->where('user_id','=',$id)->first();
    	$user = DB::table('user_info')->where('user_id','=',$id)->first();
    	$encrypted = DB::table('encrypted')->where('user_id','=',$id)->first();
//		dd($encrypted);
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
		$data['password'] = Hash::make($request->input('password'));
		$pass = $request->input('plpassword');
		$id = session('user')->user_id;
		$password = DB::table('users')->where('user_id','=',$id)->value('password');
        if (Hash::check($pass, $password)) {
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
        $data = $request->only('issue1','issue2','result1','result2');
    	$data['user_id'] = session('user')->user_id;
		$bool = DB::table('encrypted')->where('user_id','=',$data['user_id'])->first();
		if(!$bool) {
			if(DB::table('encrypted')->insert($data)) {
				$datb['title1'] = '设置安全问题';
				$datb['title2'] = 'Set Safety Question';
				$datb['name'] = '设置安全问题';
				return view('Home.Personal.endsafetypass',['data'=>$datb]);
			}else{
				return back()->with('error','添加失败');
			}
		}else{
			return back()->with('error','添加失败');
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

	public function verifyencrypted(Request $request)
	{
		$id = session('user')->user_id;
		$token = $request->input('token');
		$dbtoken = DB::table('encrypted')->where('user_id','=',$id)->value('token');
		if($token == $dbtoken) {
			$data = DB::table('encrypted')->where('user_id','=',$id)->select('issue1','issue2')->first();
			$data->url = $request->input('url');
//			dd($data);
		    return view('Home.Personal.verifyencrypted',['data'=>$data]);
		}else{
			return redirect('/personalsafety')->with('error','非法操作');	
		}
	}
	
	public function doverifyencrypted(Request $request)
	{
		$id = session('user')->user_id;
		$data = $request->only('result1','result2');
		$result = DB::table('encrypted')->where('user_id','=',$id)->select('result1','result2')->first();
//		dd();
		if($data['result1'] == $result->result1 && $data['result2'] == $result->result2) {
			$token = rand(1,99999999);
			$data= DB::table('encrypted')->where('user_id','=',$id)->update(['token'=>$token]);
			$url = $request->input('url');
			return redirect('/'.$url.'?token='.$token);
		}else{
			return back()->with('error','答案错误');
		}
		
		
	}
	
//	修改手机页面
    public function safetyphone(Request $request)
	{
		$id = session('user')->user_id;
		$token = $request->input('token');
		$dbtoken = DB::table('encrypted')->where('user_id','=',$id)->value('token');
		if(!$token == $dbtoken) {
			$token = rand(1,99999999);
			$data= DB::table('encrypted')->where('user_id','=',$id)->update(['token'=>$token]);
			return redirect('/verifyencrypted?url=safetyphone&token='.$token);
		}
		return view('Home.personal.safetyphone');
	}
	
//	执行修改手机
    public function dosafetyphone(SafetyPhone $request)
	{
		$data['password'] = $request->all();
		dd($data);
		$pass = $request->input('plpassword');
		$id = session('user')->user_id;
		$password = DB::table('users')->where('user_id','=',$id)->value('password');
        if (Hash::check($pass, $password)) {
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
	
	
    public function safetyencrypted(Request $request)
    {
		$id = session('user')->user_id;
		$token = $request->input('token');
		$dbtoken = DB::table('encrypted')->where('user_id','=',$id)->value('token');
		if(!$token == $dbtoken) {
			$token = rand(1,99999999);
			$data= DB::table('encrypted')->where('user_id','=',$id)->update(['token'=>$token]);
			return redirect('/verifyencrypted?url=safetyencrypted&token='.$token);
		}
		$data = DB::table('encrypted')->where('user_id','=',$id)->first();
		return view('Home.Personal.safetyencryptededit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dosafetyencrypted(Request $request)
    {
        //
		$id = session('user')->user_id;
        $data = $request->only('issue1','issue2','result1','result2');
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
