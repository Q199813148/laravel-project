<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Shows;

class ShowsController extends Controller
{
    /**
     * 轮播图管理类
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取搜索内容
        $k = $request->input('keywords');
        //获取数据库数据
        $data = Shows::where("name","like","%".$k."%")->orderBy("id")->paginate(3);
//        dd($request->all());
        return view("Admin.Shows.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Admin.Shows.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->file('pic')->getClientSize());

        //处理文件上传
        if($request->hasFile('pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            // $ext=$request->file('photo')->extension();
            $ext=$request->file("pic")->getClientOriginalExtension();
            $date = date("Y-m-d");
            //移动到指定的目录下（提前在public下新建uploads目录）
            $request->file("pic")->move("./uploads/shows/".$date,$name.".".$ext);
        }else{
            return back()->with("notice","请上传主图");
        }
        //获取输入数据
        $data = $request->except("_token");
        //判断是否写入协议
        if(substr($data['url'],0,7)!="http://" && substr($data['url'],0,8)!="https://"){
            $data['url']='http://'.$data['url'];
        }
        //拼接图片路径
        $data['pic'] = "/uploads/shows/".$date."/".$name.'.'.$ext;
//        dd($data);
        //写入数据库
        if(DB::table("shows")->insert($data)){
            return redirect('/adminshows')->with("success","添加成功");
        }else{
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
        //获取id对应数据
//        $data = DB::select("select * from shows where id = {$id}");
        $data = DB::table("shows")->where("id","=",$id)->first();

        return view("Admin.Shows.edit",['data'=>$data]);

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
        //如果有文件上传
        if($request->hasFile('pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            // $ext=$request->file('photo')->extension();
            $ext=$request->file("pic")->getClientOriginalExtension();
            $date = date("Y-m-d");
            //移动到指定的目录下（提前在public下新建uploads目录）
            $request->file("pic")->move("./uploads/shows/".$date,$name.".".$ext);
        }
        //获取数据
        $data = $request->except("_token","_method");

        //判断是否有图片修改
        if(isset($data['pic'])){
            //拼接商品主图路径
            $data['pic'] = "/uploads/shows/".$date."/".$name.'.'.$ext;
        }else{
            //获取原主图信息
            $data['pic'] = DB::table("shows")->select('pic')->where("id","=",$id)->first()->pic;
        }

        //判断是否写入协议
        if(substr($data['url'],0,7)!="http://" && substr($data['url'],0,8)!="https://"){
            $data['url']='http://'.$data['url'];
        }

        if(DB::table("shows")->where("id","=",$id)->update($data)){
            return redirect('/adminshows')->with("success","修改成功");
        }else{
            return back()->with("error",'未修改内容');;
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
        //获取删除的id
        if(DB::delete("delete from shows where id = $id")){
            return redirect('/adminshows')->with("success","删除成功");
        }else{
            return back()->with("error",'删除失败');;
        }
    }

    public function ajax(Request $request) {
        $id = $request->input('id');
        $sta = $request->input('status');
        if($sta == '隐藏'){
            $data = DB::table("shows")->where("id", '=', $id)->update(['status'=>1]);
        }else{
            $data = DB::table("shows")->where("id", '=', $id)->update(['status'=>0]);
        }
        if($data){
            return response()->json(['msg'=>1]);
        }else{
            return response()->json(['msg'=>0]);
        }
    }
}
