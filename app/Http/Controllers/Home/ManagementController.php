<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //获取userid
        $user_id = session("user")->user_id;

        //所有订单
        $data = DB::table('orders')
            ->where('user_id',$user_id)
            ->orderBy('id','desc')
            ->paginate(5);
        $details = array();
        foreach ($data as $value){
            $details[$value->id]=DB::table('details')
                ->join('goods','details.good_id','goods.id')
                ->select('goods.photo','goods.price','goods.name','details.*')
                ->where('order_id',$value->id)
                ->get();
        }

        //待付款订单
        $df_data = DB::table('orders')
            ->where([['user_id',$user_id],['status','0']])
            ->orderBy('id','desc')
            ->paginate(5);
        $df_details = array();
        foreach ($df_data as $value){
            $df_details[$value->id]=DB::table('details')
                ->join('goods','details.good_id','goods.id')
                ->select('goods.photo','goods.price','goods.name','details.*')
                ->where('order_id',$value->id)
                ->get();
        }

        //待发货订单
        $dfh_data = DB::table('orders')
            ->where([['user_id',$user_id],['status','1']])
            ->orderBy('id','desc')
            ->paginate(5);
        $dfh_details = array();
        foreach ($dfh_data as $value){
            $dfh_details[$value->id]=DB::table('details')
                ->join('goods','details.good_id','goods.id')
                ->select('goods.photo','goods.price','goods.name','details.*')
                ->where('order_id',$value->id)
                ->get();
        }

        //待收货订单
        $dsh_data = DB::table('orders')
            ->where([['user_id',$user_id],['status','2']])
            ->orderBy('id','desc')
            ->paginate(5);
        $dsh_details = array();
        foreach ($dsh_data as $value){
            $dsh_details[$value->id]=DB::table('details')
                ->join('goods','details.good_id','goods.id')
                ->select('goods.photo','goods.price','goods.name','details.*')
                ->where('order_id',$value->id)
                ->get();
        }

        //待评价订单
        $dpj_data = DB::table('orders')
            ->where([['user_id',$user_id],['status','2']])
            ->orderBy('id','desc')
            ->paginate(5);
        $dpj_details = array();
        foreach ($dpj_data as $value){
            $dpj_details[$value->id]=DB::table('details')
                ->join('goods','details.good_id','goods.id')
                ->select('goods.photo','goods.price','goods.name','details.*')
                ->where('order_id',$value->id)
                ->get();
        }

        return view("Home.Management.management", [
                'data'=>$data,'details'=>$details,
                'df_data'=>$df_data,'df_details'=>$df_details,
                'dfh_data'=>$dfh_data,'dfh_details'=>$dfh_details,
                'dsh_data'=>$dsh_data,'dsh_details'=>$dsh_details,
                'dpj_data'=>$dpj_data,'dpj_details'=>$dpj_details
            ]);
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

    }

    /**
     * 删除订单
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('orders')->where('id',$id)->first();
        //判断是否和提交订单的用户id是同一个id
        $userid = session('user')->user_id;
        if ($userid != $data->user_id) {
            exit;
        }
        //判断是否是完成
        if($data->status < 4){
            return redirect("/order_management");
        }
        //删除订单
        DB::table('orders')->where('id',$id)->delete();
        DB::table('details')->where('order_id',$id)->delete();
        return redirect("/order_management");
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
        $data = DB::table('orders')->where('id',$id)->first();
        //判断是否和提交订单的用户id是同一个id
        $userid = session('user')->user_id;
        if ($userid != $data->user_id) {
            exit;
        }
        //判断是否是发货
        if($data->status != 2){
            return redirect("/order_management")->with('errore','未发货,请勿做尝试');
        }
        //确认收货
        if(DB::table('orders')->where('id',$id)->update(['status'=>3])){
            return redirect("/order_management")->with('success','收货成功');;
        }

    }

    //订单详情
    public function info(Request $request)
    {
        $id = $request->input('id');
        //查询订单信息
        $data = DB::table('orders')->where('id',$id)->first();
        //隐藏手机号
        $data->phone = substr_replace($data->phone,'****',3,4);
        //判断是否和查看详情的用户id是同一个id
        $userid = session('user')->user_id;
        if ($userid != $data->user_id) {
            return back()->with('error','非法请求');
        }
        //查询订单详情
        $info = DB::table('details')
            ->join('goods','details.good_id','goods.id')
            ->select('goods.*','details.*','details.num as dnum')
            ->where('order_id',$id)
            ->get();

        $express = json_decode(curlGet("http://www.kuaidi100.com/query?type=$data->company&postid=$data->express",'get'));
        return view("Home.Order.info",['data'=>$data,'info'=>$info,'express'=>$express]);
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
