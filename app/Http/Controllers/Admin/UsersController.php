<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Users;
use App\Model\User_info;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //获取搜索关键词
        $k=$request->input('keywords');
        //用户列表
        $data=Users::where('name',"like","%".$k."%")->paginate(3);
        // var_dump($data);exit;
        //加载
        // echo "后台用户";
        // dd($data);
        return view("Admin.Users.index",['data'=>$data,'request'=>$request->all()]);
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
        //单条结果
        // echo $id;
        $data=User_info::where("user_id",'=',$id)->first();
        //加载模板
        // dd($data);
        return view("Admin.Users.info",['data'=>$data]);
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


//  ajax更改状态
    public function ajax(Request $request)
    {
//      获取传输数据
            return response()->json(['msg'=>1]);
        $id = $request->input('id');
        $sta = $request->input('s');
//      执行修改操作
        if($sta == 1){  
        $data = DB::table("users")->where("user_id",'=',$id)->update(['status'=>0]);
        }else{
        $data = DB::table("users")->where("user_id",'=',$id)->update(['status'=>1]);
        }
//      返回结果
        if($data){
            return response()->json(['msg'=>1]);
        }else{
            return response()->json(['msg'=>0]);
        }
    }

    public function edits(Request $request)
    {
        $id=$request->input("id");
        // echo $id;
        $level = DB::table("users")->where("user_id","=",$id)->value("level");
        if($level == 0){

            if(DB::table("users")->where("user_id","=",$id)->update(['level'=>1])){
                return response()->json(['level'=>1]);
            }

        }else{
            if(DB::table("users")->where("user_id","=",$id)->update(['level'=>0])){
                return response()->json(['level'=>1]);
            }
        }
        
    }
}
