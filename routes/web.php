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
//modifier:Memory
//	后台各种页
	Route::group(["middleware"=>'login'], function(){
	    Route::resource("/admin", "Admin\AdminController");
	    //后台管理信息
	    Route::resource("/adminusers", "Admin\AdminuserController");
//		ajax更改状态

		Route::get("/adminuser/ajax", "Admin\AdminuserController@ajax");
		//后台商品信息
		Route::resource("/adminshop", "Admin\ShopController");
		//后台商品分词
		Route::get("/adminshopajax", "Admin\ShopController@ajax");
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
        //公告管理
        Route::resource("/adminnotice","Admin\NoticeController");
        //ajax修改状态
        Route::get("/adminnotices","Admin\NoticeController@ajax");
        //后台公告删除
        Route::get("/adminnoticedel","Admin\NoticeController@del");

	});


//	后台登陆页
	Route::get("/admins/login", "Admin\AdminController@login");
	//	后台执行登陆
	Route::post("/admins/dologin", "Admin\AdminController@dologin");
//	退出登陆
	Route::get("/admins/exit", "Admin\AdminController@exit");


	//end Memory



//	前台各种页
	Route::group(["middleware"=>'home'], function(){
//		前台个人中心页
		Route::resource("/personal", "Home\PersonalController");

		Route::get("/personaldata", "Home\PersonalController@data");
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



