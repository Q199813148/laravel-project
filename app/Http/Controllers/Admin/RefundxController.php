<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RefundxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$data = DB::table("refundxs")->where('status',1)->paginate(5);	
        return view("Admin.Refundx.index", ['data'=>$data]);
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
//   审核退款
    public function edit($id)
    {
//  	获取数据
        $data = DB::table('refundxs')
			->where('refundxs.id',$id)
			->join('details', 'refundxs.details_id', 'details.id')
			->join('goods', 'details.good_id', 'goods.id')
			->join('orders', 'details.order_id','orders.id')
			->select(
			'refundxs.id as id',
			'refundxs.refundx_type as type',
			'refundxs.refundx_name as r_name',
			'refundxs.price as price',
			'refundxs.content as content',
			'refundxs.time as time',
			'details.taste as taste',
			'details.num as num',
			'goods.name as g_name',
			'orders.name as name'
			)->first();

		return view('Admin.Refundx.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//   执行审核
    public function update(Request $request, $id)
    {
        $data = $request->only('bool','content');
		if($data['bool'] == 1) {
			DB::table('refundxs')->where('id',$id)->update(['status'=>2,'content'=>$data['content']]);
			return redirect('/adminrefundx')->with('success','审批成功');
		}elseif($data['bool'] == 0){
			DB::table('refundxs')->where('id',$id)->update(['status'=>3,'content'=>$data['content']]);
			return redirect('/adminrefundx')->with('success','审批成功');
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
