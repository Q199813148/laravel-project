<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Illuminate\Support\Facades\Cookie;
use App\Models\AdminRole;
use App\Http\Requests\Admin\AdminRoleinsert;

class AdminRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//
        $k=$request->input('seek');
		$data = AdminRole::where('name',"like","%".$k."%")->paginate(5);
		return view('Admin.AdminRole.index',['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.AdminRole.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRoleinsert $request)
    {
        //获取所需数据
        $data = $request->only(['name']);
		$data['status'] = 1;
//		执行添加操作
        if(DB::table("role")->insert($data)) {
            return redirect('/adminrole')->with('success', '添加成功');
        } else {
            return redirect('/adminrole/create')->with('error', '添加失败');
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
    	$data = DB::table('role')->where('id', '=', $id)->first();
		return view('Admin.Adminrole.edit', ['data'=>$data]);
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
        //获取数据
        $data = $request->only('name', 'status');
//		执行修改
        if($data = DB::table("role")->where("id", '=',$id)->update($data)) {
            return redirect("/adminusers")->with('success', '修改成功');
        } else {
            return redirect("/adminusers/".$id."/edit")->with('error', '修改失败');
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
        //执行删除

        if($id == 1){
            return redirect("/adminrole")->with('error', '无法删除超级管理员');
        }
        if(DB::table("role")->where("id", '=', $id)->delete()) {
			DB::table("role_node")->where("role_id", '=', $id)->delete();
            return redirect("/adminrole")->with('success', '删除成功');
        } else {
            return redirect("/adminrole")->with('error', '删除失败');
        }
    }
}
