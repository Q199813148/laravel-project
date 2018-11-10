<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodslistController extends Controller
{
    //
    public function index(Request $request) {
        //搜索内容
        $ss = $request->input('ss');
        //查询数据
//        $data = DB::table('goods_words')->
        return view("Home.Goods.goodslist");
    }
}
