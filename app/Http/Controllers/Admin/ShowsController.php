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
        $data = Shows::where("name","like","%".$k."%")->paginate(3);
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
        //处理文件上传
        if($request->hasFile('pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            // $ext=$request->file('photo')->extension();
            $ext=$request->file("pic")->getClientOriginalExtension();

            //移动到指定的目录下（提前在public下新建uploads目录）
            $request->file("pic")->move("./uploads/shows/".date("Y-m-d"),$name.".".$ext);
        }else{
            return back()->with("notice","请上传主图");
        }

        //获取输入数据
        $data = $request->except("_token");
        dd($data);
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
}
