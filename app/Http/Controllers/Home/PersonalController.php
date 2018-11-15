<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    /**
     * 个人中心
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session('user')->user_id; 
        $orders = DB::table('orders')->where('user_id','=',$id)->get();
        $user = DB::table('user_info')->where('user_id','=',$id)->first();
		$collect = DB::table('collect')->where('user_id','=',$id)->offset(0)->limit(8)->select('goods_id')->get();
		foreach($collect as $key=>$val) {
			$goods[] = DB::table('goods')->where('id','=',$val->goods_id)->first();
		}
		$sales = DB::table('goods')->where('status','=',1)->orderBy("sales",'desc')->first();
		$new = DB::table('goods')->where('status','=',1)->orderBy("id",'desc')->first();
//		dd($sales);
//		dd($orders);
//		付
		$data['hand'] = 0;
//		发
		$data['issue'] = 0;
//		收
		$data['receipts'] = 0;
//		评
		$data['discuss'] = 0;
		foreach($orders as $val) {
			switch($val->status) {
				case 0:
					$data['hand'] += 1;
					break;
				case 1:
					$data['issue'] += 1;
					break;
				case 2:
					$data['receipts'] += 1;
					break;
				case 3:
					$data['discuss'] += 1;
					break;
			}
		}
//		dd($data);
        return view('Home.Personal.index',['data'=>$data,'user'=>$user,'goods'=>$goods,'sales'=>$sales,'new'=>$new]);
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
//        获取数据
        $data = DB::table('user_info')->where('user_id','=',$id)->first();	
		$data->dates = date('Y'); 
		$birthday = explode('-', $data->birthday);
		$data->years = empty($birthday[0])?'':$birthday[0];
		$data->month = empty($birthday[1])?'':$birthday[1];
		$data->day = empty($birthday[2])?'':$birthday[2];
        return view('Home.Personal.data',['data'=>$data]);
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
        //获取用户详情数据
		$data = $request->except('_token','_method','userimg','years','month','day','email');
		$data['birthday'] = $request->only('years')['years'].'-'.$request->only('month')['month'].'-'.$request->only('day')['day'];
//		获取用户数据
		$datb = $request->only('email','phone');
//		检查是否有文件上传
		if($request->hasFile('userimg')){
			$pic = DB::table('user_info')->where('user_id','=',$id)->value('pic');
			//初始化名字
			$fname=time().rand(1,10000);
			//获取上传文件后缀
			$ext=$request->file("userimg")->getClientOriginalExtension();
//			拼接文件路径
			$dirname = './uploads/usersimg/'.date("Y-m-d");
//			拼接文件名
			$filename = $fname.'.'.$ext;
//			获取存入数据库的pic值
			$data['pic'] = trim($dirname,'.').'/'.$filename;
//			上传文件
			$request->file("userimg")->move($dirname,$filename);
		}
		foreach($data as $key=>$val) {
			if(empty($val)) {
				unset($data[$key]);
			}
		}
		foreach($datb as $key=>$val) {
			if(empty($val)) {
				unset($datb[$key]);
			}
		}
		if(count($data)) {
//		插入用户详情表数据
			if(DB::table('user_info')->where('user_id','=',$id)->update($data)) {
	//			插入用户表数据
				if(count($datb)) {
					if(DB::table('users')->where('user_id','=',$id)->update($datb)) {}
					return redirect('/personal/'.$id.'/edit')->with('success',"修改成功");
				}
//			删除数据库头像
			if(!empty($pic)) {
				unlink('.'.$pic);
			}
			return redirect('/personal/'.$id.'/edit')->with('success',"修改成功");
	//		插入数据详情失败
			} else {
	//			删除上传文件
				if($request->hasFile('userimg')){
				unlink('.'.$data['pic']);
				}
				return redirect('/personal/'.$id.'/edit')->with('success',"修改失败");
			}
		}else{
			return redirect('/personal/'.$id.'/edit')->with('success',"修改失败");
		}
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
