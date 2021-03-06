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
        //查询分词表数据
        $data = DB::table('goods_words')->select('word','goods_id')->where("word","=",$ss)->get();
        //将查询到的id放到数组中
        $arr = array();
        foreach ($data as $key=>$value){
            $arr[$key] = $value->goods_id;
        }
        //查询对应的商品信息(判断以什么排序)
        if($request->input('order') == 'sales'){
            $list = DB::table('goods')->where("status","=",'0')->whereIn("id",$arr)->orderBy('sales','desc')->paginate(12);
        }elseif($request->input('order') == 'price'){
            $list = DB::table('goods')->where("status","=",'0')->whereIn("id",$arr)->orderBy('price','asc')->paginate(12);
        }else{
            $list = DB::table('goods')->where("status","=",'0')->whereIn("id",$arr)->paginate(12);
        }
//        dd($request->all()['order']);
        //获取总条数
        $num = count($list);
        //经典搭配(随机获取数据)
        $match = DB::select("SELECT * FROM goods WHERE id >= ((SELECT MAX(id) FROM goods)-(SELECT MIN(id) FROM goods)) * RAND() + (SELECT MIN(id) FROM goods) AND status=0 LIMIT 3");
//        dd($list);
        return view("Home.Goods.goodslist",['list'=>$list,'num'=>$num,'ss'=>$ss,'match'=>$match,'request'=>$request->all()]);
    }
}
