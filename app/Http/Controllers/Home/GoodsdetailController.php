<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class GoodsdetailController extends Controller
{
    //商品详情
    public function index(Request $request)
    {
        //获取商品id
        $id = $request->input('id');
        //获取商品数据
        $data = DB::table('goods')->where('id', '=', $id)->where('status', '=', '0')->first();
        if (empty($data)) {
            return redirect("/");
        }
        //获取商品口味信息
        $taste = explode(',', $data->taste);
        //看了又看(随机获取数据)
        $match = DB::select("SELECT * FROM goods WHERE id >= ((SELECT MAX(id) FROM goods)-(SELECT MIN(id) FROM goods)) * RAND() + (SELECT MIN(id) FROM goods) AND status=0 LIMIT 5");
        //猜你喜欢
        $guess = DB::select("SELECT * FROM goods WHERE status=0 order by sales DESC LIMIT 12");
        //查询收藏数
        $collect = DB::table('collect')->where('good_id','=',$id)->count();
        //dd($collect);
        //上传收藏数  num
        DB::table('goods')->where('id','=',$id)->update(['num'=>$collect]);
        //获取session('user')
        //if (session('user')) {}
        $dd = '';
        if (session('user')) {
        	$user_id=session('user')->user_id;
        	$dd = DB::table('collect')->where('user_id','=',$user_id)->where('good_id','=',$id)->count();
        	if ($aa=DB::table('history')->where('user_id','=',$user_id)->where('goods_id','=',$id)->first()) {
        		//先删除
        		//dd($aa);
        		DB::table('history')->where('id','=',$aa->id)->delete();	
        		//再添加
        		$cc = array();
        		$cc['user_id'] = $user_id;
        		$cc['goods_id'] = $id;
        		$cc['addtime'] = date('Y-m-d H:i:s');
        		//dd($cc);
        		DB::table('history')->insert($cc);
        	} else {
        		//没有浏览记录则直接添加
        		$cc = array();
        		$cc['user_id'] = $user_id;
        		$cc['goods_id'] = $id;
        		$cc['addtime'] = date('Y-m-d H:i:s');
        		DB::table('history')->insert($cc);
        	}
        }
        	 //商品详情页评价
        $details = DB::table('goods')
            ->join('details','goods.id','=','details.good_id')
            ->join('orders','details.order_id','=','orders.id')
            ->join('comment',[['orders.user_id','=','comment.user_id'],['comment.detail_id','details.id']])
            ->join('users','comment.user_id','=','users.user_id')
            ->join('user_info','users.user_id','user_info.user_id')
            ->where([['goods.id',$id],['orders.status','>=','4']])
            ->select('users.name as name','user_info.pic as photo','comment.id as id','comment.addtime as addtime','comment.content as content','comment.pic as pic','details.taste as taste','details.num as num')
            ->orderBy("id",'desc')
            ->paginate(10);
//         dd($details);

        return view("Home.Goods.goodsdetail", ['data' => $data, 'id' => $id, 'taste' => $taste, 'match' => $match, 'guess' => $guess,'dd' => $dd,'details'=>$details,'request'=>$request->all()]);
        


        
    }
}
