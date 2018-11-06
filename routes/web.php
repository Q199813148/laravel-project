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
	return redirect("/index");
});
	//后台
	//modifier:Memory
//	后台各种页
	Route::resource("/admin", "Admin\AdminController")->middleware('login');
//	后台登陆页
	Route::get("/admins/login", "Admin\AdminController@login");
//	后台执行登陆
	Route::post("/admins/dologin", "Admin\AdminController@dologin");
//	退出登陆
	Route::get("/admins/exit", "Admin\AdminController@exit");

	//end Memory

	//前台首页
	Route::resource("/index", "Home\HomeController");
	//后台用户管理
	Route::resource("/adminuser","Admin\UsersController");