<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Shops;

class ShopController extends Controller
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
        //获取列表数据
        $data=Shops::where('name',"like","%".$k."%")->orderBy("id")->paginate(3);
        //查询分类中文名称
        foreach ($data as $value){
            $typeid = $value->type_id;
            $name = DB::table("types")->where("id","=",$typeid)->first();
            if($name) { 
	            $value->type_id=$name->name;
            } else { 
            	$value->type_id='分类不存在';
            }
        }
//        dd($data);
        return view("Admin.Shops.index",['data'=>$data,'request'=>$request->all()]);
    }

    public function del(Request $request)
    {
        $id = $request->input('id');
        if(DB::table('goods')->where("id","=",$id)->delete()){
            //删除成功
            echo '1';
        }else{
            //删除失败
            echo '2';
        }

    }

    public function gettypes()
    {
        //获取列表数据
        //防sql注入
        $types=DB::table("types")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        //遍历
        foreach ($types as $key => $value) {
            //转换为数组
            $arr=explode(",",$value->path);
            //获取逗号个数
            $len=count($arr)-1;
            $types[$key]->name=str_repeat("--|",$len).$value->name;
        }
        return $types;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //添加商品
    public function create()
    {
        //获取分类信息
        $types=$this->gettypes();
//        dd($types);
        return view("Admin.Shops.add",['types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //处理添加
    public function store(Request $request)
    {
        //主图上传

        if($request->hasFile('photo')){
        //初始化名字
            $name=time()+rand(1,10000);
        //获取上传文件后缀
        // $ext=$request->file('photo')->extension();
            $ext=$request->file("photo")->getClientOriginalExtension();
            $date = date("Y-m-d");
        //移动到指定的目录下（提前在public下新建uploads目录）
            $request->file("photo")->move("./uploads/shops/".$date,$name.".".$ext);
        }

        $data = $request->except("_token");
        //拼接商品主图路径
        $data['photo'] = "/uploads/shops/".$date."/".$name.'.'.$ext;
//        dd($data);
        if(DB::table("goods")->insert($data)){
            return redirect('/adminshop')->with("success","添加成功");
        }else{
            return back()->with("error",'添加失败');;
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
//        dd($id);
        //获取分类
        $types=$this->gettypes();
        $goods = DB::table('goods')->where("id","=",$id)->first();
        return view("Admin.Shops.edit",['goods'=>$goods,'types'=>$types]);
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
        //主图上传
        //dd($request->all());
        if($request->hasFile('photo')){
            //初始化名字
            $name=time()+rand(1,10000);
            //获取上传文件后缀
            // $ext=$request->file('photo')->extension();
            $ext=$request->file("photo")->getClientOriginalExtension();
            $date = date("Y-m-d");
            //移动到指定的目录下（提前在public下新建uploads目录）
            $request->file("photo")->move("./uploads/shops/".$date,$name.".".$ext);
        }

        $data = $request->except("_token","_method");
        //判断是否有主图修改
        if(isset($data['photo'])){
            //拼接商品主图路径
            $data['photo'] = "/uploads/shops/".$date."/".$name.'.'.$ext;
        }else{
            //获取原主图信息
            $data['photo'] = DB::table("goods")->select('photo')->where("id","=",$id)->first()->photo;
        }

//        dd($data);
        if(DB::table("goods")->where("id","=",$id)->update($data)){
            return redirect('/adminshop')->with("success","修改成功");
        }else{
            return back()->with("error",'修改失败');;
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
