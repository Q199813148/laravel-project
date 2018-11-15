<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ucpaas;
use DB;
use Hash;
use Illuminate\Support\Facades\Cookie;
//用户注册校验类
use App\Http\Requests\Home\HomeRegist;
//导入模型类
use App\Model\Home\shows;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettypesbypid($pid)
    {
        //获取分类信息
        // $res=DB::table('types')->where("pid",'=',$pid)->get();
        $res = DB::select("select * from types where pid = $pid AND status = 1");
        $data=[];
        //分类遍历
        foreach($res as $key=>$value)
        {
            $value->suv=$this->gettypesbypid($value->id);
            $data[]=$value;
        }
        return $data;
    }


    public function index()
    {
        //获取轮播图信息
        $shows = \App\Model\Shows::where('status','=','1')->orderBy('id')->get();
//      $shows = DB::select("select * from shows where status = 1");
        $i=1;
        //公告
        $notice = DB::select("select * from notice where status = 1 order by id desc limit 0,5");
        //dd($notice);
        $types=$this->gettypesbypid(0);
        // dd($types);
        //分类
        $types=$this->gettypesbypid(0);
        // dd($types);
        
        //获取广告信息
        $advertisements = DB::table("advertisement")->where("status",'=','1')->orderBy('id')->get();
        // dd($advertisements);
        //查询分类
        $type = DB::table("types")->where("status",'=','1')->where("pid",'=',"0")->offset(0)->limit(10)->get();
        // dd($type);
        //首页商品
        $goods = DB::table("goods")->where("status",'=','1')->orderBy('id')->get();
        // dd($goods);

        return view("Home.Home.index",['types'=>$types,'shows'=>$shows,'i'=>$i,'advertisements'=>$advertisements,'notice'=>$notice,'type'=>$type]);
    }

    //ajax首页商品列表
    public function goodslist(Request $request)
    {
        $data = $request->all();
        // dd($data['id']);
        $types = DB::table('types')->where("status",'=','1')->where('pid','=',$data['id'])->offset(0)->limit(1)->first();
        $oneid = $types->id;
        $typess = DB::table('types')->where("status",'=','1')->where('pid','=',$oneid)->offset(0)->limit(1)->first();
        $twoid = $typess->id;
        if($goods = DB::table('goods')->where("status",'=','0')->where("type_id",'=',$twoid)->offset(0)->limit(5)->get()) {
        // dd(count($goods));
            if(count($goods)) {
                foreach( $goods as $row) {
            echo '
                <div class="am-u-sm-3 am-u-md-2 text-three" style="height:300px;" >
                    <div class="outer-con ">
                        <div class="title ">
                            '.$row->name.'
                        </div>
                        <div class="sub-title ">
                            '.$row->price.'
                        </div>
                    </div>
                        <a href="#">
                            <img  src='.$row->photo.'/>
                        </a>
                </div>
                ';
            }
            }else{
            echo '
            <center>
                <div class="am-u-sm-3 am-u-md-2 text-three" style="height:0px;" >
                    <div class="outer-con ">
                        <div class="title ">
                        </div>
                    </div>
                        <a href="#">
                            <img  src="/static/Home/images/zanwu.png"/>
                        </a>
                </div>
            </center>
                ';
            }
        }
    }
    //公告列表
    public function notice(Request $request)
    { 
    	//dd($_GET['id']);
    	$id=$_GET['id'];
    	$data = DB::select("select * from notice where status = 1 and id = $id ");
    	$info = DB::select("select * from notice where status = 1");
    	return view("Home.Home.notice",['data'=>$data,'info'=>$info]);
    }

    //遍历链接
    public function links()
    { 
    	$links = DB::select("select * from links where status = 1 order by id asc limit 0,5");
    	//dd($links);
    	foreach ($links as $value) {
	    	echo '
				<b>|</b>
				<a href='.$value->url.'>'.$value->name.'</a>
    		';
    	}
    }

    //链接申请
    public function relinks(Request $request)
    { 
    	return view("Home.Home.links");
    }

    //执行申请表单
    public function dorelinks(Request $request)
    { 
    	$data = $request->input();
    	$data['addtime']=date('Y-m-d:H:i:s');
    	$data['status']= 0;
    	unset($data['_token']);
    	//dd($data);
    	if(DB::table("relinks")->insert($data)){ 
        	return redirect("/")->with('success','添加成功');
        } else { 
        	return back()->with('error','添加失败');
        }
    }

    //注册页面
    public function regist()
    { 
    	return view("Home.Home.regist");
    }
    //执行注册
    public function register(HomeRegist $request)
    {
    	$data = $request->except(['repassword','_token','lists','err','code']); 
		if(!$request->input('code') == Cookie::get('smsid')) {
            return back()->with("error",'验证码不合法或过期');
		}
		if(!$request->input('lists') == 111111) {
            return back()->with("error",'数据异常');
		}
//		$data['name'] = 'yj用户'.rand(99999999,1000000000);
		$data['password'] = Hash::make($data['password']);
		$data['token'] = '1';
		$data['addtime'] = date('Y-m-d h:i:s');
		$data['status'] = 1;
		$data['level'] = 0;
		$datb['u_name'] = $data['name'];
		$datb['phone'] = $data['phone'];
		$datb['sex'] = 2;	
		if($id = DB::table("users")->insertGetId($data)) {
			$datb['user_id'] = $id;
			$bool = DB::table('user_info')->insert($datb);
			if($bool) {
    			return redirect('/login')->with('success',"注册成功");
			} else {
				if(DB::table('users')->where('user_id','=',$id)->delect()) {
    				return redirect('/regist')->with('error',"操作过于频繁，请稍后重试");
				} else {
	    			return redirect('/regist')->with('error',"操作过于频繁，请稍后重试");
				}
    			return redirect('/regist')->with('error',"操作过于频繁，请稍后重试");
			}
		}
		

    }
	//发送手机验证码
	public function rephone(Request $request)
	{
		//发送短信校验码的手机号
		$p = $request->input('phone');
		//调用接口
		//载入ucpass类
//		require_once('Ucpaas.class.php');
		//连接一系列骚操作
		//填写在开发者控制台首页上的Account Sid
		$options['accountsid'] = 'fc2345e5ebdb1c244789627b0623cb25';
		//填写在开发者控制台首页上的Auth Token
		$options['token'] = '8f632969038add6338709a9ef91eeae4';
	
		//初始化 $options必填
		$ucpass = new Ucpaas($options); 
		$appid = "ed3185d8f4ea45a493e0d0fedbd8252b";	//应用的ID，可在开发者控制台内的短信产品下查看
		//短信模板id
		$templateid = "396344";    //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
		//发送的验证码
		$param =rand(1000,9999); //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
		//接收验证码的手机号
		$mobile = $p;
		$uid = "";
		//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
		Cookie::queue("smsid",$param,2);
		echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
		
	}
//	验证手机号码
    public function mecode(Request $request)
    {
//  	获取发送验证码时存入的cookie
    	$smsid = Cookie::get('smsid');
//		获取传过来的验证码
		$yzm = $request->input('yzm');
//		判断
		if((!empty($yzm)) && (!empty($smsid))) {
			if($yzm == $smsid) {
				echo 1;
			} else {
				echo 2;
			}
		}elseif(empty($yzm)) {
			echo 3;
		} else{
			echo 4;
		}	
    }
    //登录界面
    public function login()
    { 
    	return view("Home.Home.login");
    }

    //执行登录
    public function dologin(Request $request)
    { 
    	session_start();
    	//验证验证码
    	$request->flashOnly('name');
    	if($_SESSION['code'] != $request->input('code')){ 
    		return redirect('/login')->with('error','验证错误');
    	}

    	//获取输出信息并加密密码
    	$name = $request->input('name');
    	$password = $request->input('password');
    	$namebool = DB::table('users')->where("name",'=',$name)->first();
    	//$username=$namebool['name'];
    	//dd($username);
    	// dd($namebool->password);
    	if ($namebool) {
            if (Hash::check($password, $namebool->password)) {
//              删除密码并存入session
                unset($namebool->password);
                session(['user' => $namebool]);

                return redirect('/')->with('success','登录成功');

    		} else {
            return redirect('/login')->with('error',"用户名或密码不正确");
        }
    	} else {
    		return redirect('/login')->with('error',"用户名或密码不正确");
    	}
    	
    	
    }

    //退出登录
    public function exit(Request $request)
    { 
    	$session = $request->session()->pull('user');
    	//$session=$request->unset($_SESSION);
    	if ($session) {
    		return redirect('/');
    	} else { 
    		return redirect('/');
    	}
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
