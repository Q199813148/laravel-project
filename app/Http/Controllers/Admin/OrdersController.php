<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Orders;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //获取搜索关键词
        $k = $request->input('keywords');
        //查询信息
        $data = Orders::where('orderno','like','%'.$k."%")->paginate(4);
        // var_dump($data);exit;
        //加载模板
        return view("Admin.Orders.index",['data'=>$data,'request'=>$request->all()]);
        
    }

    //订单转态
    public function status(Request $request)
    {
        //获取id
        $id = $request->input('id');
        // echo $id;
        // 查询数据
        $status = DB::table('orders')->where('id','=',$id)->value("status");
        // echo $status;
        // 修改数据
        if($status == 1){
            if(DB::table('orders')->where('id','=',$id)->update(['status'=>2])){
                //返回数据
                return response()->json(['status'=>1]);
            }
        }
        
    }
    //退款状态
    public function refund(Request $request)
    {
        //获取id
        $id = $request->input('id');
        // echo $id;
        //查询数据
        $refund = DB::table('orders')->where('id','=',$id)->value('refund');
        //echo $refund
        //判断 修改数据
        if($refund == 1){
            if(DB::table('orders')->where('id','=',$id)->update(['refund'=>2])){
                //返回
                return response()->json(['refund'=>1]);
            }
        }else if($refund == 2){
            if($refund = DB::table('orders')->where('id','=',$id)->update(['refund'=>3])){
                // 返回
                return response()->json(['refund'=>2]);
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
