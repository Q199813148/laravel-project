<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//添加管理员校验类
use App\Http\Requests\Admin\AdminuserUserinsert;
//修改管理员校验类
use App\Http\Requests\Admin\AdminusereditUserinsert;

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
		$data = DB::table("admin")->where('name', 'like', '%'.$seek.'%')->paginate(5);
		$role = DB::table("role")->where('status','=',1)->get();
        return view("Admin.Adminusers.index", ['data'=>$data, 'role'=>$role, 'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$role = DB::table('role')->where('status','=',1)->get();
        return view("Admin.Adminusers.add",['role'=>$role]);
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
        $data = $request->except(['repassword', '_token']);
		$data['password'] = Hash::make($data['password']);
		$data['status'] = 1;
		$data['level'] = 0;
//		执行添加操作
        if(DB::table("admin")->insert($data)) {
            return redirect('/adminusers')->with('success', '添加成功');
        } else {
            return redirect('/adminusers/create')->with('error', '添加失败');
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
     * 修改管理员资料
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//		获取修改数据插入模板
    	$data = DB::table('admin')->where('id', '=', $id)->first();
    	$role = DB::table('role')->where('status','=',1)->get();
		return view('Admin.Adminusers.edit', ['data'=>$data,'role'=>$role]);
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminusereditUserinsert $request, $id)
    {
        //获取数据
        $data = $request->except('_token', '_method');
//		查询出当前数据
		if($id == 1 && $data['level'] != 1) {
            return redirect("/adminusers/".$id."/edit")->with('error', '无法修改超级管理员权限');
		}
//		如若数据未被修改则不修改该字段
        $update = DB::table('admin')->where('id','=',$id)->first();
		if($data['name'] == $update->name) {
			unset($data['name']);
		}
		if($data['phone'] == $update->phone) {
			unset($data['phone']);
		}
		if($data['email'] == $update->email) {
			unset($data['email']);
		}
//		执行修改
        if($data = DB::table("admin")->where("id", '=',$id)->update($data)) {
            return redirect("/adminusers")->with('success', '修改成功');
        } else {
            return redirect("/adminusers/".$id."/edit")->with('error', '修改失败');
        }
    }

    /**
     * 删除管理员
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除
        $level = DB::table('admin')->where('id','=',$id)->value('level');
        if($level == 1){
            return redirect("/adminusers")->with('error', '无法删除超级管理员');
        }
        if(DB::table("admin")->where("id", '=', $id)->delete()) {
            return redirect("/adminusers")->with('success', '删除成功');
        } else {
            return redirect("/adminusers")->with('error', '删除失败');
        }
    }
//	ajax更改状态
	public function ajax(Request $request)
	{
//		获取传输数据
		$id = $request->input('id');
		$sta = $request->input('s');
//		执行修改操作
		if($sta == 1){	
        $data = DB::table("admin")->where("id", '=', $id)->update(['status'=>0]);
		}else{
        $data = DB::table("admin")->where("id", '=', $id)->update(['status'=>1]);
		}
//		返回结果
		if($data){
			return response()->json(['msg'=>1]);
		}else{
			return response()->json(['msg'=>0]);
		}
	}
}
