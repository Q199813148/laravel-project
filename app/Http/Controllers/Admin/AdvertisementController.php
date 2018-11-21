<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Advertisement;
class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //获取关键词
        $k=$request->input('keywords');
        //获取列表数据
        $data=Advertisement::where('title','like','%'.$k.'%')->orderBy("id")->paginate(3);
        //加载模板
        return view("Admin.Advertisement.index",['data'=>$data,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view("Admin.Advertisement.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->only(['title','descr','url']);
        $data['status'] = 1;
        //主图上传
        if($request->hasFile('pic')){
        //初始化名字
            $name=time()+rand(1,10000);
        //获取上传文件后缀
        // $ext=$request->file('pic')->extension();
            $ext=$request->file("pic")->getClientOriginalExtension();
            $date = date("Y-m-d");
        //移动到指定的目录下（提前在public下新建uploads目录）
            $request->file("pic")->move("./uploads/advertisements/".$date,$name.".".$ext);
        }
        //拼接商品主图路径
        $data['pic'] = "/uploads/advertisements/".$date."/".$name.'.'.$ext;
       // dd($data);
       if(DB::table("advertisement")->insert($data)){
            return redirect('/adminadvertisement')->with("success","添加成功");
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
        // 获取数据
        $advertisement = DB::table('advertisement')->where("id",'=',$id)->first();
        //加载模板
        return view("Admin.Advertisement.edit",['advertisement'=>$advertisement]);
    }


    public function ajax(Request $request)
    {   
        //获取ID
        $id=$request->input("id");
        // echo $id;
        // 查询level
        $level = DB::table("Advertisement")->where("id","=",$id)->value("status");
        // 判断level
        if($level == 0){

            if(DB::table("Advertisement")->where("id","=",$id)->update(['status'=>1])){
                //返回
                return response()->json(['status'=>1]);
            }

        }else{
            if(DB::table("Advertisement")->where("id","=",$id)->update(['status'=>0])){
                //返回
                return response()->json(['status'=>1]);
            }
        }
        
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
        //主图上传
        //dd($request->all());
        if($request->hasFile('pic')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            // $ext=$request->file('pic')->extension();
            $ext=$request->file("pic")->getClientOriginalExtension();
            $date = date("Y-m-d");
            //移动到指定的目录下（提前在public下新建uploads目录）
            $request->file("pic")->move("./uploads/advertisements/".$date,$name.".".$ext);
        }

        //获取数据
        $data = $request->only(['title','descr','url','status']);
        //判断是否有主图修改
        if(isset($data['pic'])){
            //拼接商品主图路径
            $data['pic'] = "/uploads/advertisements/".$date."/".$name.'.'.$ext;
        }else{
            //获取原主图信息
            $data['pic'] = DB::table("advertisement")->select('pic')->where("id","=",$id)->first()->pic;
        }

       //dd($data);
        if(DB::table("advertisement")->where("id","=",$id)->update($data)){
            return redirect('/adminadvertisement')->with("success","修改成功");
        }else{
            return back()->with("error",'修改失败');
        }
    }
    

    public function del(Request $request)
    {
        $id = $request->input('id');
        // echo $id;
        if(DB::table('advertisement')->where("id",'=',$id)->delete()){
            //删除成功
            echo '1';
        }else{
            //删除失败
            echo '2';
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
