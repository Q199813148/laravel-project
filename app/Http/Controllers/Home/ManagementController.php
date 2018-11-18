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
