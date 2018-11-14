<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//添加收货信息校验类
use App\Http\Requests\Home\HomePersonaleditinsert;
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
        //
        return view('Home.Personal.index');
    }
	
    /**
     * 个人资料
     *
     * @return \Illuminate\Http\Response
     */
    
	
	
	
	

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
    public function update(HomePersonaleditinsert $request, $id)
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
			unlink('.'.$pic);
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
