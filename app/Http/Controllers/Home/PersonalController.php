<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//添加收货信息校验类
use App\Http\Requests\Home\HomePersonaleditinsert;
use Illuminate\Support\Facades\Storage;
use Hash;
use Illuminate\Support\Facades\Cookie;

class PersonalController extends Controller
{
    /**
     * 个人中心
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//  	获取id
        $id = session('user')->user_id; 
//		获取订单数据
        $orders = DB::table('orders')->where('user_id','=',$id)->get();
//		获取用户数据
        $user = DB::table('user_info')->where('user_id','=',$id)->first();
//		获取收藏数据
		$collect = DB::table('collect')->where('user_id','=',$id)->offset(0)->limit(8)->select('good_id')->get();
//		获取收藏的商品
		foreach($collect as $key=>$val) {
			$goods[] = DB::table('goods')->where('id','=',$val->good_id)->first();
		}
//		获取销量最多商品
		$sales = DB::table('goods')->where('status','=',0)->orderBy("sales",'desc')->first();
//		获取最近添加商品
		$new = DB::table('goods')->where('status','=',0)->orderBy("id",'desc')->first();
//		dd($new);
//		dd($collect);
//		获取订单信息
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
	
	
	
	
	

    //收货地址
    public function address (Request $request)
    {
        //查询用户id
        $userid = session('user')->user_id;
        // dd($userid);
        // 查询数据库信息
        $data = DB::table("address")->where("user_id",'=',$userid)->get();
        // dd($data);
        //加载模板
        return view('Home.Personal.address',['data'=>$data]);
    }
    //默认地址ajax
    public function default (Request $request)
    {
        // 接收id
        $id = $request->input("id");
        // echo $id;
        //判断default 更改默认值
            if(DB::table('address')->where("default",'=',0)->update(['default'=>1]) && DB::table("address")->where("id","=",$id)->update(['default'=>0])) {
                return response()->json(['default'=>1]);
            } else {
                return response()->json(['default'=>0]);
            }
    }
    //收货地址
    public function district(Request $request)
    {
        $upid = $request->input("upid");
        $data = DB::table("district")->where("upid",'=',$upid)->get();
        // dd($data);
        //返回
        return response()->json(['data'=>$data]);
    }
    //删除收货地址
    public function del(Request $request)
    {   
        //获取id
        $id = $request->input("id");
        // echo $id;
        // 判断default改值 删除数据库数据
        if(DB::table('address')->where('id','=',$id)->value('default') == 0) {
            if($default = DB::table('address')->where('default','=',1)->first()) {
                $default = DB::table('address')->where('id','=',$default->id)->update(['default'=>0]);
                // dd($default);
                if(DB::table('address')->where('id','=',$id)->delete()){
                    // 成功
                    echo '1';
                }else{
                   // 失败
                    echo '2';
                }
            }else{
                echo '3';
            }

        }else{
            if(DB::table('address')->where('id','=',$id)->delete()){
                    // 成功
                    echo '1';
                }else{
                   // 失败
                    echo '2';
                }
        }
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }
    //收藏列表
    public function collectlist(Request $request)
    { 
    	$user_id=session('user')->user_id;
    	//$good_id=$request->input('good_id');
    	$info = DB::table("collect")->select('good_id')->where('user_id','=',$user_id)->get();
    	$arr = array();
    	//$num = array();
    	foreach ($info as $key => $value) {
    		$arr[]=$value->good_id;
    		//$num[] = DB::table("collect")->where('good_id','=',$value->good_id)->count();
    	}
    	//dd($num);
    	//DB::table("collect")->update()
    	$data = DB::table("goods")->whereIn('id',$arr)->get();
    	//dd($data);
    	//dd($info);
    	//dd($num);
    	return view("Home.Personal.collectlist",['info'=>$info,'data'=>$data]);
    }

    //添加收藏商品
    public function collect(Request $request)
    {
        //session_start();
        //dd(session('user'));
        $user_id=session('user')->user_id;
        $good_id=$request->input('id');
        //dd($id);
        $collect['user_id']=$user_id;
        $collect['good_id']=$good_id;
        //dd($collect);
        if (DB::table("collect")->where('user_id','=',$user_id)->where('good_id','=',$good_id)->first()) {
        	//取消收藏
        	//$this->collectdel($good_id);
        	return redirect("/collectdel?good_id=$good_id");
        	//return back()->with('error','收藏失败');
        } else {
        	if (DB::table("collect")->insert($collect)) {
        		return back()->with('success','收藏成功');
        	} else {
        		return back()->with('error','收藏失败');
        	}

        }     
    }

    //取消收藏
    public function collectdel(Request $request)
    { 
    	$good_id=$request->input('good_id');
    	$user_id=session('user')->user_id;
    	//$req = DB::table("collect")->where('good_id','=',$good_id)->where('user_id','=',$user_id)->delete();
    	//dd($good_id);
    	if (DB::table("collect")->where('good_id','=',$good_id)->where('user_id','=',$user_id)->delete()) {
    		return back()->with('success','取消收藏');
    	} else {
    		return back()->with('error','取消收藏失败');
    	}
    	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //增加地址
    public function store(HomePersonaleditinsert $request)
    {   

        //查询用户id
        $userid = session('user')->user_id;
        $address = DB::table('address')->where('user_id',$userid)->get();
        // dd(count($address));
        if(count($address) < 6){
            //获取数据
            $data = $request->except('_token','city','detailed','province');
            if(count($address) < 1){
                $data['default'] = 0;
            }else{
                $data['default'] = 1;
            }
            //切割再拼接
            $data['address'] = join(explode(',',$request->input('city')),' ').' '.$request->input('detailed');
            $data['user_id'] = session('user')->user_id;
            // dd($data);
            // 添加
            if(DB::table("address")->insert($data)) {
                return redirect('/personaladdress')->with('success', '添加成功');
            } else {
                return back()->with("error",'添加失败');
            }
        }else{
            echo '<script>alert("地址上限无法添加!");location="/personaladdress"</script>';
        }
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
     * 修改用户信息
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
     * 执行用户信息修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //获取用户详情数据
		$data = $request->except('_token','_method','userimg','years','month','day','email','phone','status');
//      dd($data);
		$data['birthday'] = $request->only('years')['years'].'-'.$request->only('month')['month'].'-'.$request->only('day')['day'];
//		获取用户数据

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
		if(count($data)) {
//		插入用户详情表数据
			if(DB::table('user_info')->where('user_id','=',$id)->update($data)) {
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
