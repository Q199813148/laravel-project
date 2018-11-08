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
Route::get("/", function () {
//	return redirect("/index");
});
	//后台
	//modifier:Memory
//	后台各种页
	Route::group(["middleware"=>'login'], function(){
		Route::resource("/admin", "Admin\AdminController");
		//后台管理信息
		Route::resource("/adminusers", "Admin\AdminuserController");
		//后台商品信息
		Route::resource("/shop", "Admin\ShopController");
		//后台用户管理
		Route::resource("/adminuser", "Admin\UsersController");
		//后台分类管理
		Route::resource("/admintypes", "Admin\TypesController");
	});
	
//	后台登陆页
	Route::get("/admins/login", "Admin\AdminController@login");
//	后台执行登陆
	Route::post("/admins/dologin", "Admin\AdminController@dologin");
//	退出登陆
	Route::get("/admins/exit", "Admin\AdminController@exit");

	//end Memory
	//前台首页
	Route::resource("/index", "Home\HomeController");
	//前台注册页
	Route::get("/regist","Home\HomeController@regist");
	//前台执行注册
	Route::post("/index/register","Home\HomeController@register");
	//前台登录
	Route::get("/login","Home\HomeController@login");
	//前台执行登录
	Route::post("/index/dologin","Home\HomeController@dologin");

