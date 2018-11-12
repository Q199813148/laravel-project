<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    /**
     * 个人中心
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Home.Personal.index');
    }
	
    /**
     * 个人资料
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
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
//        获取数据
        $data = DB::table('user_info')->where('user_id','=',$id)->first();	
		$data->dates = date('Y'); 
		$birthday = explode('-', $data->birthday);
		$data->years = empty($birthday[0])?'':$birthday[0];
		$data->month = empty($birthday[1])?'':$birthday[1];
		$data->day = empty($birthday[2])?'':$birthday[2];
        return view('Home.Personal.data',['data'=>$data]);
		dd($birthday);
    }
	
	public function personalimg(Request $request)
	{
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
        //获取用户详情数据
		$data = $request->except('_token','_method','userimg','years','month','day','email');
		$data['birthday'] = $request->only('years')['years'].'-'.$request->only('month')['month'].'-'.$request->only('day')['day'];
//		获取用户数据
		$datb = $request->only('email','phone');
//		检查是否有文件上传
		if($request->hasFile('userimg')){
			$pic = DB::table('user_info')->where('user_id','=',$id)->value('pic');
			//初始化名字
			$fname=time().rand(1,10000);
			//获取上传文件后缀
			$ext=$request->file("userimg")->getClientOriginalExtension();
//			拼接文件路径
			$dirname = './uploads/usersimg/'.date("Y-m-d");
//			拼接文件名
			$filename = $fname.'.'.$ext;
//			获取存入数据库的pic值
			$data['pic'] = trim($dirname,'.').'/'.$filename;
//			上传文件
			$request->file("userimg")->move($dirname,$filename);
		}
		foreach($data as $key=>$val) {
			if(empty($val)) {
				unset($data[$key]);
			}
		}
		foreach($datb as $key=>$val) {
			if(empty($val)) {
				unset($datb[$key]);
			}
		}
		if(count($data)) {
//		插入用户详情表数据
			if(DB::table('user_info')->where('user_id','=',$id)->update($data)) {
	//			插入用户表数据
				if(count($datb)) {
					if(DB::table('users')->where('user_id','=',$id)->update($datb)) {}
					return redirect('/personal/'.$id.'/edit')->with('success',"修改成功");
				}
//			删除数据库头像
			unlink('.'.$pic);
			return redirect('/personal/'.$id.'/edit')->with('success',"修改成功");
	//		插入数据详情失败
			} else {
	//			删除上传文件
				if($request->hasFile('userimg')){
				unlink('.'.$data['pic']);
				}
				return redirect('/personal/'.$id.'/edit')->with('success',"修改失败");
			}
		}else{
			return redirect('/personal/'.$id.'/edit')->with('success',"修改失败");
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
