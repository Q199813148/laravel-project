<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//后台
//	后台各种页
	Route::group(["middleware"=>'login'], function(){
	    Route::resource("/admin", "Admin\AdminController");
	    //后台管理信息
	    Route::resource("/adminusers", "Admin\AdminuserController");
		//ajax更改状态
		Route::get("/adminuser/ajax", "Admin\AdminuserController@ajax");
		//后台商品信息
		Route::resource("/adminshop", "Admin\ShopController");
		//后台商品分词
		Route::get("/adminshopajax", "Admin\ShopController@ajax");
		//后台商品分词
		Route::get("/adminshopsajax", "Admin\ShopController@statusajax");
		//后台商品删除
        Route::get("/adminshopdel", "Admin\ShopController@del");
		//后台用户管理
		Route::resource("/adminuser", "Admin\UsersController");
		Route::get("/adminuse/ajax", "Admin\UsersController@ajax");
		Route::get("/adminuserss", "Admin\UsersController@edits");
		//后台分类管理
		Route::resource("/admintypes", "Admin\TypesController");
		Route::get("/admintypess", "Admin\TypesController@edits");
		//轮播图管理
        Route::resource("/adminshows", "Admin\ShowsController");
        Route::get('/adminshowsajax', "Admin\ShowsController@ajax");
        //友情链接管理
        Route::resource("adminlinks","Admin\LinksController");
        //链接申请列表
        Route::get("/linkreq","Admin\LinksController@linkreq");
        //执行表单申请
		Route::post('/dolinkreq',"Admin\LinksController@dolinkreq");
        //ajax修改状态
        Route::get("/adminlinkss","Admin\LinksController@ajax");
        //申请链接ajax删除
        Route::get("/adminlinksreqdel","Admin\LinksController@del");
        //公告管理
        Route::resource("/adminnotice","Admin\NoticeController");
        //ajax修改状态
        Route::get("/adminnotices","Admin\NoticeController@ajax");
        //后台公告删除
        Route::get("/adminnoticedel","Admin\NoticeController@del");
        //广告管理
	    Route::resource("/adminadvertisement", "Admin\AdvertisementController");
	    Route::get("/Advertisement/ajax", "Admin\AdvertisementController@ajax");
        //后台商品订单管理
        Route::resource("/adminorders","Admin\OrdersController");
        //后台商品订单管理 订单状态
        Route::get("/adminordersstatus","Admin\OrdersController@status");
        //后台商品订单管理 退款状态
        Route::get("/adminordersrefund","Admin\OrdersController@refund");
//      后台角色管理
        Route::resource("/adminrole","Admin\AdminRoleController");
//      后台角色权限管理
        Route::resource("/adminnode","Admin\AdminNodeController");
//      后台退款管理
		Route::resource('/adminrefundx', 'Admin\RefundxController');
	});


//	后台登陆页
	Route::get("/admins/login", "Admin\AdminController@login");
	//	后台执行登陆
	Route::post("/admins/dologin", "Admin\AdminController@dologin");
//	退出登陆
	Route::get("/admins/exit", "Admin\AdminController@exit");







//	前台各种页
	Route::group(["middleware"=>'home'], function(){
//		前台个人中心页
		Route::resource("/personal", "Home\PersonalController");
		//收货地址修改
		Route::resource("/addressedit", "Home\AddressController");
//		前台个人中心安全设置
		Route::resource("/personalsafety",'Home\PersonalsafetyController');
//		安全设置修改密码
		Route::get("/safetypass",'Home\PersonalsafetyController@safetypass');
//		执行修改密码
		Route::post("/dosafetypass",'Home\PersonalsafetyController@dosafetypass');
//		安全设置修改邮箱
		Route::get("/safetyemail",'Home\PersonalsafetyController@safetyemail');
//		执行修改邮箱
		Route::post("/dosafetyemail",'Home\PersonalsafetyController@dosafetyemail');
//		安全设置修改手机
		Route::get("/safetyphone",'Home\PersonalsafetyController@safetyphone');
//		执行修改手机
		Route::post("/dosafetyphone",'Home\PersonalsafetyController@dosafetyphone');
//		调用密保检验
		Route::get("/verifyencrypted",'Home\PersonalsafetyController@verifyencrypted');
//		执行密保验证
		Route::post("/doverifyencrypted",'Home\PersonalsafetyController@doverifyencrypted');
//		修改密保
		Route::get("/safetyencrypted",'Home\PersonalsafetyController@safetyencrypted');
//		执行修改密保
		Route::post("/dosafetyencrypted",'Home\PersonalsafetyController@dosafetyencrypted');
	
        //收货地址
        Route::get("/personaladdress","Home\PersonalController@address");
        //收货地址默认ajax
        Route::get("/personaladdress/default","Home\PersonalController@default");
        //收货地址地区
        Route::get("/personaladdress/district","Home\PersonalController@district");
        //收货地址删除ajax
        Route::get("/personaladdress/del","Home\PersonalController@del");
        //购物车
        Route::post('/cart', 'Home\CartController@index');
        Route::get('/cart', 'Home\CartController@index');
        Route::get('/cart/minus', 'Home\CartController@minus');
        Route::get('/cart/ajaxadd', 'Home\CartController@ajaxadd');
        Route::get('/cart/del', 'Home\CartController@del');
        Route::get('/cart/change', 'Home\CartController@change');
        //确认订单
        Route::post('/confirm_order', 'Home\ConfirmOrderController@index');
        //提交订单
        Route::post('/submit_order', 'Home\SubmitOrderController@index');
        //直接购买提交订单
        Route::post('/submitorder', 'Home\SubmitOrderController@immediately');
        //服务器异步通知页面路径
        Route::any('notify','Home\SubmitOrderController@AliPayNotify');
        //页面跳转同步通知页面路径
        Route::any('return','Home\SubmitOrderController@AliPayReturn');

        //添加收藏
		Route::get("/collectadd","Home\PersonalController@collect");
		//收藏列表
		Route::get("/collectlist","Home\PersonalController@collectlist");
		//取消收藏
		Route::get("/collectdel","Home\PersonalController@collectdel");
		//立即评价
		Route::resource("/comment","Home\CommentController");
		//查看评价
        Route::get("/myRate", "Home\CommentController@myRate");

		//个人中心-订单管理
        Route::resource("/order_management", "Home\ManagementController");
        //订单详情
        Route::get("/order_info", "Home\ManagementController@info");
        //订单支付
        Route::get("/orderpay", "Home\SubmitOrderController@orderpay");

        //足迹
		Route::resource("/history","Home\historyController");
		Route::get("/historydel","Home\historyController@historydel");
//		退款
		Route::resource('/refundx','Home\RefundxController');
		Route::get("/dorefundx","Home\RefundxController@doRefundx");
	});

	//前台首页
	Route::resource("/", "Home\HomeController");
	//前台注册页
	Route::get("/regist", "Home\HomeController@regist");
	//前台执行注册
	Route::post("/register", "Home\HomeController@register");
//	前台注册ajax发送手机短信验证
	Route::get("/rephone", "Home\HomeController@rephone");
//	前台注册ajax校验手机验证码
	Route::get("/mecode", "Home\HomeController@mecode");
//	邮箱注册
	Route::post("/registemail", "Home\HomeController@registemail");
//	重新发送邮箱
	Route::post("/emailagain", "Home\HomeController@emailagain");
//	成功发送邮箱
	Route::post("/endemregist", "Home\HomeController@endemregist");
//	执行邮箱验证
	Route::get("/doregistemail", "Home\HomeController@doregistemail");
//	找回密码
	Route::get("/forgetpass", "Home\HomeController@forgetpass");
//	ajax发送邮箱
	Route::get("/sendemail",'Email\EmailController@sendemail');
//	找回密码检测账号
	Route::get("/doforgetpass", "Home\HomeController@doforgetpass");
//	找回密码检测短信验证
	Route::post("/reforgetpass", "Home\HomeController@reforgetpass");
//	找回密码检测邮箱验证
	Route::post("/reemforgetpass", "Home\HomeController@reemforgetpass");
//	找回密码修改密码
	Route::post("/endforgetpass", "Home\HomeController@endforgetpass");
	//前台登录
	Route::get("/login", "Home\HomeController@login");
	//前台执行登录
	Route::post("/dologin", "Home\HomeController@dologin");
	//退出登录
	Route::get("/exit", "Home\HomeController@exit");
	//分词测试
	Route::get('/scws', 'WordCutController@scwsCut');
	//商品列表
	Route::get('/goodslist',"Home\GoodslistController@index");
    //首页商品列表ajax
    Route::get("/homegoodslist","Home\HomeController@goodslist");
	//公告列表
	Route::get('/notice',"Home\HomeController@notice");
	//链接申请
	Route::get('/relinks',"Home\HomeController@relinks");
	//执行表单申请
	Route::post('/dorelinks',"Home\HomeController@dorelinks");
	//ajajx遍历
	Route::get('/links',"Home\HomeController@links");
    //商品详情
    Route::get('/goodsdetail', "Home\GoodsdetailController@index");
    //分类列表
    Route::get('/typelist', "Home\TypelistController@index");
    //curl
    Route::get('/curl',"Home\HomeController@curl");
    //地图  map
    Route::get('/map',"Home\HomeController@map");
    //获取购物车数量
    Route::get("/cartnum", "Home\HomeController@cartnum");

