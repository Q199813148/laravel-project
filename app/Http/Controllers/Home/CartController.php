<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

//使用redis实现一个购物车功能
class CartController extends Controller
{
    //购物车
    /**
     * @param Request $request //获取请求
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        //判断是加入购物车操作还是直接进入购物车操作
        if ($request->isMethod('post')) {
            //post方式
            $this->add($request);
        }
        //获取用户id
        $user_id = session('user')->user_id;
        //获取用户购物车数据
        $data = DB::table('cart')
            ->join('goods', 'cart.goods_id', '=', 'goods.id')
            ->select('cart.id', 'cart.num', 'cart.taste', 'goods.id as goods_id', 'goods.name', 'goods.price', 'goods.store', 'goods.photo')
            ->where([['cart.user_id', $user_id],['goods.status', 0],['goods.store','>','0']])
            ->get();

        return view("Home.Cart.index", ['data' => $data]);

    }

    public function add($request)
    {
        $data = ($request->except('_token'));
        //用户id
        $user_id = session('user')->user_id;
        //商品id
        $goods_id = $request->input('goods_id');
        //商品口味
        $taste = $request->input('taste');
        //将用户id放进数组
        $data['user_id'] = $user_id;
        //查询数据库是否有同样的商品
        $goods = DB::select("select * from cart where user_id=$user_id and goods_id=$goods_id and taste='$taste'");

        if ($goods) {
            //如果已有数据,则获取加入购物车的数量添加到该数据
            //加入购物车的数量
            $n = $request->input('num');
            //获取对应数据的id
            $cart_id = $goods[0]->id;
            //获取原有数量
            $num = DB::table('cart')->select('num')->where('id', '=', $cart_id)->first()->num;
            //相加条数得到总条数
            $nums = $n + $num;
            //修改数据
            if (DB::table('cart')->where('id', '=', $cart_id)->update(['num' => $nums])) {
                return redirect('/cart');
            } else {
                return back();
            }
        } else {
            //如果没有数据,则直接写入数据库
            $bool = DB::table('cart')->insert($data);
            if ($data) {
                return redirect('/cart');
            } else {
                return back();
            }
        }
    }

    //ajax减数量
    public function minus(Request $request)
    {
        $id = $request->input('id');
        $num = $request->input('num') - 1;
        if ($num < 1) {
            echo '2';exit;
        }

        if (DB::update("update cart set num=$num where id=$id")) {
            echo '1';
        } else {
            echo '0';
        }
    }

    //ajax加数量
    public function ajaxadd(Request $request)
    {
        $id = $request->input('id');
        $num = $request->input('num') + 1;

        if (DB::update("update cart set num=$num where id=$id")) {
            echo '1';
        } else {
            echo '0';
        }
    }

    //ajax删除
    public function del(Request $request)
    {
        $id = $request->input('id');
        if(DB::delete("delete from cart where id=$id")){
            echo '1';
        }else{
            echo '0';
        }
    }

    //ajax修改
    public function change(Request $request)
    {
        //商品id
        $id = $request->input('id');
        //数量
        $num = $request->input('num');

        if(DB::update("update cart set num=$num where id=$id")){
            echo '1';//成功修改
        }else{
            echo '2';//修改失败
        }
    }
}
