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

        $data = DB::table("links")->where('name','like','%'.$k.'%')->orderBy('id','asc')->paginate(3);
        
        return view("Admin.Links.index",['data'=>$data,'request'=>$request->all()]);
    }

    //友情链接申请
    public function linkreq(Request $request)
    { 
    	 $k = $request->input('keywords');
        //获取数据库数据
        $data = DB::table("relinks")->where('name','like','%'.$k.'%')->orderBy('id','asc')->paginate(3);
        
        return view("Admin.Links.linkreq",['data'=>$data,'request'=>$request->all()]);
    }

    //执行申请
    public function dolinkreq(Request $request)
    { 
    	$id=$request->input("id");
    	$req =  DB::table("relinks")->select('name','status','url')->where('id','=',$id)->first();
    	$req->status = 0;
    	//dd($req);
    	$links=array();
    	foreach ($req as $key => $value) {
    		$links[$key]=$value;
    	}
    	//dd($links);
    	if (DB::table("links")->insert($links)) {
    		if (DB::table("relinks")->where('id','=',$id)->delete()) {
    			return redirect('/linkreq')->with('success','同意申请');
    		}
    		return redirect('/linkreq')->with('success','同意申请');
    	} else {
    		return redirect('/linkreq')->wiht('error','未同意申请');
    	}
    	

    }


    public function ajax(Request $request)
    {
        //获取ID
        $id=$request->input("id");
        // echo $id;
        $status = DB::table("links")->select('status')->where("id","=",$id)->first()->status;
        // 判断status
        if($status == 0){
            if(DB::table("links")->where("id","=",$id)->update(['status'=>1])){
                //返回
                return response()->json(['status'=>1]);
            }

        }else{
            if(DB::table("links")->where("id","=",$id)->update(['status'=>0])){
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
        if (1) {
        	DB::table('links')->where('id','=',$id)->update($data);
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

    //申请列表ajax删除
    public function del(Request $request)
    {
        $id = $request->input('id');
        //dd($id);
        if(DB::table('relinks')->where("id","=",$id)->delete()){
            //删除成功
            echo '1';
        }else{
            //删除失败
            echo '2';
        }

    }
}
