<?php

namespace App\Http\Controllers\Home;

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
        //
    	$uid = session('user')->user_id;
		$data = DB::table('refundxs')
		->where('status','>=',1)
		->paginate(8);
		if(!empty($data)) {
			foreach($data as $key=>$val) {
			$datb[$key] = DB::table('details')
			->where('details.id',$val->details_id)
			->where('orders.user_id',$uid)
			->join('orders','orders.id','details.order_id')
			->join('goods','goods.id','details.good_id')
			->select('orders.user_id as user_id','details.good_id as goods_id','details.order_id as order_id','goods.name as name','details.taste as taste','orders.orderno as orderno','goods.photo as photo')
			->first();
			if(!empty($datb[0])) {
				$datb[$key]->price = $val->price;
				$datb[$key]->details_id = $val->details_id;
				$datb[$key]->status = $val->status;
				$datb[$key]->id = $val->id;
				$datb[$key]->time = $val->time;
				$datb[$key]->content = $val->content;
			}
			}
		}
		if(!empty($datb[0])) {
    	    return view('Home.Refundx.index',['data'=>$data,'datb'=>$datb]);
		}else{
    	    return view('Home.Refundx.index');
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
    	$uid = session('user')->user_id;
		$data = DB::table('details')
		->join('orders','orders.id','details.order_id')
		->join('goods','goods.id','details.good_id')
		->where('details.id',$id)
		->where('orders.user_id',$uid)
		->select('details.id as id','orders.user_id as user_id','details.good_id as goods_id','details.order_id as order_id','goods.name as name','details.taste as taste','orders.orderno as orderno','goods.price as price','details.num as num','orders.time as time','goods.photo as photo','orders.status as status')
		->first();
		if($data->status < 1){
		    return back()->with('error','非法操作!未付款订单!');
        }
		$data->sum = $data->price*$data->num;
		return view('Home.Refundx.edit',['data'=>$data]);
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
    	$uid = session('user')->user_id;
        $data = $request->only('refundx_type','refundx_name','content');
		$datb = DB::table('details')
		->where('details.id',$id)
		->join('orders','orders.id','details.order_id')
		->join('goods','goods.id','details.good_id')
		->where('orders.user_id',$uid)
		->select('goods.price as price','details.num as num')
		->first();
		$data['price'] = $datb->price*$datb->num;
		$data['details_id'] = $id;
		$data['status'] = 1;
		$data['time'] = date('Y-m-d H-i-s');
//		dd($data);
		if(DB::table('refundxs')->insert($data)) {
			return redirect('/dorefundx')->with('success','申请成功');
		}else{
			return redirect('/refundx')->with('success','申请失败');
		}
    }
	public function doRefundx()
	{
		return view('Home.Refundx.dorefundx');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if(DB::table('refundxs')->where('id',$id)->delete()) {
			return redirect('/refundx')->with('success','取消成功');
		}else{
			return redirect('/refundx')->with('success','取消失败');
		}
    }
}
