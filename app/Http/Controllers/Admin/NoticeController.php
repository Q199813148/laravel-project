<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Notice;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索内容
        $k = $request->input('keywords');
        //获取数据库数据
        $data = DB::table("notice")->where('title','like','%'.$k.'%')->orderBy('id','asc')->paginate(3);
        return view("Admin.Notice.index",['data'=>$data,'request'=>$request->all()]);
    }


    //  ajax更改状态
    public function ajax(Request $request)
    {
        //获取ID
        $id=$request->input("id");
        // echo $id;
        // 查询level
        $status = DB::table("notice")->where("id","=",$id)->value("status");
        // 判断status
        if($status == 0){
            if(DB::table("notice")->where("id","=",$id)->update(['status'=>1])){
                //返回
                return response()->json(['status'=>1]);
            }

        }else{
            if(DB::table("notice")->where("id","=",$id)->update(['status'=>0])){
                //返回
                return response()->json(['status'=>1]);
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模版
        return view("Admin.Notice.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取需要添加的数据
        $data = $request->only(['title','status','content']);
        $data['addtime']=date('Y-m-d:H:i:s');
        //dd($data);
        if(DB::table("notice")->insert($data)){ 
        	return redirect("/adminnotice")->with('success','添加成功');
        } else { 
        	return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function del(Request $request)
    {
        $id = $request->input('id');
        //dd($id);
        if(DB::table('notice')->where("id","=",$id)->delete()){
            //删除成功
            echo '1';
        }else{
            //删除失败
            echo '2';
        }

    }
    public function show($id)
    {
        $data=DB::table('notice')->where('id','=',$id)->first();
        //加载模板
         //dd($data);
        return view("Admin.Notice.content",['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取需要修改的数据
        $data=DB::table('notice')->where('id','=',$id)->first();
        //加载模版
        return view("Admin.Notice.edit",['data'=>$data]);
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
        $data=$request->only('title','status','content');
        //dd($data);
        //$sql=DB::table('notice')->where('id','=',$id)->update($data);
        //dd($sql);
        if (DB::table('notice')->where('id','=',$id)->update($data)) {
        	return redirect('/adminnotice')->with('success','修改成功');
        } else {
        	return redirect('/adminnotice/{id}/edit')->with('error','修改失败');
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
