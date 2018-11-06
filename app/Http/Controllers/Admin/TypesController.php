<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function gettypes()
    { 
    	//获取列表数据
    	//防sql注入
    	$type=DB::table("type")->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
		//遍历
		foreach ($type as $key => $value) {
			//转换为数组
			$arr=explode(",",$value->path);
			//获取逗号个数
			$len=count($arr)-1;
			$type[$key]->name=str_repeat("--|",$len).$valye->name;
		}
		return $type;
    }


	public function index(Request $request)
	{
  		 //连贯方法结合原始表达式 防止sql语句注入
			$type=DB::table("type")->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like',"%".$request->input('keywords')."%")->orderBy('paths')->paginate(3);
			//遍历
			foreach($type as $key=>$value){
			// echo $value->path."<br>";
			//转换为数组
			$arr=explode(",",$value->path);
			// echo "<pre>";
			// var_dump($arr);
			//获取逗号个数
			$len=count($arr)-1;
			//字符串重复函数
			$type[$key]->name=str_repeat("--|",$len).$value->name;
			} 	
			//加载模板 分配数据
			return view("Admin.type.index",['type'=>$type,'request'=>$request->all()]);
	}
    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //添加分类
    public function create()
    {
        //获取所有分类信息
		$type=$this->gettypes();
		//加载添加模板
		return view("Admin.type.add",['type'=>$type]);
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
