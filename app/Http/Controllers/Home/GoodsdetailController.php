<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsdetailController extends Controller
{
    //商品详情
    public function index(Request $request) {
        //获取商品id
        $id = $request->input('id');
        //获取商品数据
        $data = DB::table('goods')->where('id','=',$id)->where('status','=','0')->first();
        if(empty($data)){
            return redirect("/");
        }
        //获取商品口味信息
        $taste = explode(',',$data->taste);
        //看了又看(随机获取数据)
        $match = DB::select("SELECT * FROM goods WHERE id >= ((SELECT MAX(id) FROM goods)-(SELECT MIN(id) FROM goods)) * RAND() + (SELECT MIN(id) FROM goods) AND status=0 LIMIT 5");
        //猜你喜欢
        $guess = DB::select("SELECT * FROM goods WHERE status=0 order by sales DESC LIMIT 12");

        return view("Home.Goods.goodsdetail",['data'=>$data,'taste'=>$taste,'match'=>$match,'guess'=>$guess]);
    }
}