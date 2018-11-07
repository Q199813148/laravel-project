<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//添加管理员校验表
use App\Http\Requests\Admin\AdminuserUserinsert;

class AdminuserController extends Controller
{
    /**
     * 管理员列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//  	获取搜索参数
        $seek = $request->input('seek');
//		会员列表
		$data = DB::table("admin")->where('name','like','%'.$seek.'%')->paginate(5);
        return view("Admin.Adminusers.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Adminusers.add");
    }

    /**
     * 管理员添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminuserUserinsert $request)
    {
//  	获取所需数据
        $data=$request->except(['repassword','_token']);
		$data['password'] = Hash::make($data['password']);
		$data['status'] = 1;
		$data['level'] = 0;
//		执行添加操作
        if(DB::table("admin")->insert($data)){
            return redirect('/adminusers')->with('success','添加成功');
        }else{
            return redirect('/adminusers/create')->with('error','添加失败');
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
//	ajax更改状态
	public function ajax(Request $request)
	{
//		获取传输数据
		$id = $request->input('id');
		$sta = $request->input('s');
//		执行修改操作
		if($sta == 1){	
        $data = DB::table("admin")->where("id",'=',$id)->update(['status'=>0]);
		}else{
        $data = DB::table("admin")->where("id",'=',$id)->update(['status'=>1]);
		}
//		返回结果
		if($data){
			return response()->json(['msg'=>1]);
		}else{
			return response()->json(['msg'=>0]);
		}
	}
}
