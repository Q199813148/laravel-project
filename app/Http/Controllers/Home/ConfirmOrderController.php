<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConfirmOrderController extends Controller
{
    //确认订单界面
    public function index(Request $request)
    {
        if($request->input('msg')=='immediately'){
            $data = $request->except('_token');
            //获取用户id
            $user_id = session('user')->user_id;
            //获取默认收货地址
            $default = DB::table('address')->where([
                ['user_id', $user_id],
                ['default', 0],
            ])->first();
            //获取其他收货地址
            $address = DB::table('address')->where([
                ['user_id', $user_id],
                ['default', 1],
            ])->get();
            //获取商品信息
            $goods = DB::table('goods')->where('id',$data['goods_id'])->first();
            return view("Home.Order.confirm_order", ['data' => $data, 'default' => $default, 'address' => $address,'goods'=>$goods]);
        }else{
            //购物车选中的id
            $id = ($request->input('checked_id'));
            //获取对应购物车数据
            $data = DB::table('cart')
                ->join('goods', 'cart.goods_id', '=', 'goods.id')
                ->select('cart.id as cart_id', 'cart.goods_id', 'cart.num', 'cart.taste', 'goods.name', 'goods.price', 'goods.photo')
                ->whereIn('cart.id', $id)
                ->where('goods.status', 0)
                ->get();
        }

        //获取用户id
        $user_id = session('user')->user_id;
        //获取默认收货地址
        $default = DB::table('address')->where([
            ['user_id', $user_id],
            ['default', 0],
        ])->first();
        //获取其他收货地址
        $address = DB::table('address')->where([
            ['user_id', $user_id],
            ['default', 1],
        ])->get();

        return view("Home.Order.confirmorder", ['data' => $data, 'default' => $default, 'address' => $address]);
    }
}
