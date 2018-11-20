<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取订单id
        $id = $request->input('id');
        //获取用户id
        $userid = session('user')->user_id;
        //获取订单数据
        $data = DB::table("orders")->where([['id',$id],['status',3],['user_id',$userid]])->first();
        //判断是否有值
        if(empty($data)){
            return redirect('/order_management');
        }
        //获取子订单
        $info = DB::table('details')
            ->join('goods','details.good_id','goods.id')
            ->select('goods.name','details.good_id','goods.photo','goods.price','details.taste','details.id')
            ->where('order_id',$id)
            ->get();

        return view('Home.Order.comment',['info'=>$info,'order_id'=>$id,'i'=>0]);
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
        //获取表单数据
        $data = $request->except('_token','order_id');
        //判断是否已经评价
        $order_id = $request->input('order_id');
        if(DB::table('orders')->select('status')->where("id",$order_id)->first()->status != 3){
            return redirect("/order_management")->with('error','非法操作,请勿重试');
        }
        //获取用户id
        $user_id = session('user')->user_id;
        //获取当前时间
        $addtime = date('Y-m-d H:i:s');
        //遍历表单数据插入数据库
        $i=0;
        foreach ($data as $key=>$value){
            //初始化数组
            $put = array();
            //评价内容
            $put['content'] = $value['content'];
            //评价星级
            $put['level'] = $value['level'];
            //上传时间
            $put['addtime'] = $addtime;
            //用户id
            $put['user_id'] = $user_id;
            //详情表id
            $put['detail_id'] = $value['detail_id'];
            //判断是否有文件上传
            if(array_key_exists('pic',$value)){
                //上传的文件
                $file[$i] = $value['pic'];
                //初始化数组
                $pic = array();
                foreach ($file[$i] as $val){
                    //初始化名字
                    $name=time()+rand(1,10000);
                    //获取上传文件后缀
                    $ext = $val->getClientOriginalExtension();
                    $date = date("Y-m-d");
                    $val->move("./uploads/comment/".$date,$name.".".$ext);
                    //拼接图片路径
                    $pic[] = "/uploads/comment/".$date."/".$name.'.'.$ext;
                }
                $i++;
                //切割数组成字符串
                $put['pic'] = join(',',$pic);
            }
            //写入数据库
            if(DB::table('comment')->insert($put)){
                DB::table('orders')->where('id',$order_id)->update(['status'=>4]);
                return redirect("/myRate")->with('success','评价成功');
            }else{
                return back()->with('error','评价失败,请重试');
            }


        }
    }

    public function myRate()
    {
        //获取用户id
        $user_id = session("user")->user_id;
        //获取所有评价数据
        $data = DB::table('comment')
            ->join('details','comment.detail_id','details.id')
            ->join('goods','details.good_id','goods.id')
            ->select("details.good_id",'goods.photo','goods.name','details.taste','comment.content','comment.level','comment.addtime')
            ->where("user_id",$user_id)
            ->get();

        //获取有图评价数据
        $data1 = DB::table('comment')
            ->join('details','comment.detail_id','details.id')
            ->join('goods','details.good_id','goods.id')
            ->select("details.good_id",'goods.photo','goods.name','comment.pic','details.taste','comment.content','comment.level','comment.addtime')
            ->where([["user_id",$user_id],['comment.pic','<>',null]])
            ->get();
        foreach ($data1 as $value){
            $value->pic = explode(',',$value->pic);
        }
        return view("Home.Order.myRate",['data'=>$data,'data1'=>$data1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
