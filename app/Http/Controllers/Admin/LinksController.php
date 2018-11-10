<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Links;
class LinksController extends Controller
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
        $data = DB::table("links")->where('name','like','%'.$k.'%')->paginate(3);
        return view("Admin.Links.index",['data'=>$data,'request'=>$request->all()]);
    }


    public function ajax(Request $request)
    {
        $id=$request->input("id");
        // echo $id;
        $status = DB::table("links")->where("id","=",$id)->value("status");
        if($status == 0){

            if(DB::table("links")->where("id","=",$id)->update(['status'=>1])){
                return response()->json(['status'=>1]);
            }

        }else{
            if(DB::table("links")->where("id","=",$id)->update(['status'=>0])){
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
        return view("Admin.Links.add");
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
        $data = $request->only(['name','url','status']);
        //dd($data);
        if (DB::table("links")->insert($data)) {
        	return redirect("/adminlinks")->with('success','添加成功');
        } else {
        	return back()->with("error",'添加失败');
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
        //获取需要修改的数据
        $links=DB::table('links')->where('id','=',$id)->first();
        //dd($links);
        //加载修改模版 分配数据
        return view("Admin.Links.edit",['links'=>$links]);
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
        $data=$request->only('name','url','status');
        //dd($data);
        if (DB::table('links')->where('id','=',$id)->update($data)) {
        	return redirect('/adminlinks')->with('success','修改成功');
        } else {
        	return redirect('/adminlinks/{id}/edit')->with('error','修改失败');
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
        if (DB::table('links')->where('id','=',$id)->delete()) {
        	return redirect("/adminlinks")->with('success','修改成功');
        } else {
        	return redirect("/adminlinks")->with('error','修改失败');
        }
        
    }
}
