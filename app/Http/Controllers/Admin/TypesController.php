<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\Admin\AdminuserTypesinsert;
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


	public function index(Request $request)
	{
  		 //连贯方法结合原始表达式 防止sql语句注入
			$types=DB::table("types")->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like',"%".$request->input('keywords')."%")->orderBy('paths')->paginate(3);
			//遍历
			foreach($types as $key=>$value){
			// echo $value->path."<br>";
			//转换为数组
			$arr=explode(",",$value->path);
			// echo "<pre>";
			// var_dump($arr);
			//获取逗号个数
			$len=count($arr)-1;
			//字符串重复函数
			$types[$key]->name=str_repeat("--|",$len).$value->name;
			} 	
			//加载模板 分配数据
			return view("Admin.types.index",['types'=>$types,'request'=>$request->all()]);
	}
    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edits(Request $request)
    {
        $id=$request->input("id");
        // echo $id;
        $status = DB::table("types")->where("id","=",$id)->value("status");
        if($status == 0){

            if(DB::table("types")->where("id","=",$id)->update(['status'=>1])){
                return response()->json(['status'=>1]);
            }

        }else{
            if(DB::table("types")->where("id","=",$id)->update(['status'=>0])){
                return response()->json(['status'=>1]);
            }
        }
        
    }

    //添加分类
    public function create()
    {
        //获取所有分类信息
		$types=$this->gettypes();
		//加载添加模板
		return view("Admin.types.add",['types'=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminuserTypesinsert $request)
    {
        //获取需要添加的数据
		$data=$request->only(['name','pid','status']);
		//获取pid
		$pid=$request->input('pid');
		$status=$request->input('status');
		 //dd($status);
		//添加顶级分类信息
		if($pid==0){
		// dd($data);
		//拼接path
		$data['path']='0';
		$data['status']=$status;
		}else{
		//添加子类信息
		// dd($data);
		//获取父类信息
		$info=DB::table("types")->where('id','=',$pid)->first();
		//拼接path
		$data['path']=$info->path.",".$info->id;
		} 
		//dd($data);
		//执行数据库的插入
		if(DB::table("types")->insert($data)){
		// echo "ok";
		return redirect("/admintypes")->with('success','分类添加成功');
		}else{
		return back()->with("error",'分类添加失败');
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
        $result=DB::table("types")->where("id",'=',$id)->first();
        //加载修改模版 分配数据
        return view("Admin.types.edit",['types'=>$result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //执行修改
    public function update(Request $request, $id)
    {
    	$data=$request->only('name');
    	if (DB::table("types")->where('id','=',$id)->update($data)) {
    		return redirect("/admintypes")->with('success',"修改成功");
    	} else {
    		return redirect("/admintypes/{id}/edit")->with('error',"修改失败");
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
        //获取删除分类的子类个数
        $res=DB::table("types")->where('pid','=',$id)->count();
        //echo $res;
        if ($res>0) {
        	return back()->with('error','请先删掉子分类');
        }
        //直接删除当前分类信息
        if (DB::table("types")->where('id','=',$id)->delete()) {
        	return redirect("/admintypes")->with('success','删除成功');
        } else {
        	return redirect("/admintypes")->with('error','删除失败');
        }
        
        
    }
}
