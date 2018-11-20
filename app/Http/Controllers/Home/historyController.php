<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class historyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=session('user')->user_id;
    	//$good_id=$request->input('good_id');
    	$data = DB::table("history")->select('goods_id')->where('user_id','=',$user_id)->orderBy("id",'desc')->get();
    	//dd($data);
    	$arr = array();
    	foreach ($data as $key => $value) {
    		$arr[]=$value->goods_id;
    	}
    	//dd($arr);
    	//goods history 联查
    	$history = DB::table('goods')->join('history','goods.id','history.goods_id')->whereIn('goods.id',$arr)->orderBy('history.id','desc')->get();
    	//dd($history);
        return view('Home.Personal.history',['data'=>$data,'history'=>$history]);
    }

    public function historydel(Request $request)
    { 
    	$id = $request->input('id');
    	//dd($id);
   		//$db = DB::table('history')->where('id','=',$id)->first();
    	//dd($db);
    	//dd(\Request::getRequestUri());
    	if (DB::table('history')->where('id','=',$id)->delete()) {
    		return back()->with('success','删除成功');
    	} else {
    		return back()->with('error','删除失败');
    	}
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
