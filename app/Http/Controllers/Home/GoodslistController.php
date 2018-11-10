<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodslistController extends Controller
{
    //
    public function index(Request $request) {
        //搜索内容
        $ss = $request->input('ss');
        //查询数据
        return view("Home.Goods.goodslist");
    }
}
