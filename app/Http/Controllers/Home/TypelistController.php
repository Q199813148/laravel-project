<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TypelistController extends Controller
{
    //
    public function index(Request $request) {
        //搜索内容
        $id = $request->input('typeid');
        //获取分类名
        $name = DB::table('types')->where('id','=',$id)->first()->name;
        //查询对应的商品信息(判断以什么排序)
        if($request->input('order') == 'sales'){
            $list = DB::table('goods')->where("status","=",'0')->where("type_id",'=',$id)->orderBy('sales','desc')->paginate(12);
        }elseif($request->input('order') == 'price'){
            $list = DB::table('goods')->where("status","=",'0')->where("type_id",'=',$id)->orderBy('price','asc')->paginate(12);
        }else{
            $list = DB::table('goods')->where("status","=",'0')->where("type_id",'=',$id)->paginate(12);
        }
//        dd($request->all()['order']);
        //获取总条数
        $num = count($list);
        //经典搭配(随机获取数据)
        $match = DB::select("SELECT * FROM goods WHERE id >= ((SELECT MAX(id) FROM goods)-(SELECT MIN(id) FROM goods)) * RAND() + (SELECT MIN(id) FROM goods) AND status=0 LIMIT 3");
//        dd($list);
        return view("Home.Goods.typelist",['list'=>$list,'num'=>$num,'id'=>$id,'match'=>$match,'name'=>$name,'request'=>$request->all()]);
    }
}
