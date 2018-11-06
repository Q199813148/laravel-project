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
	return redirect(/index);
});
//前台首页
Route::resource("/index", "Home\HomeController");
//后台管理
Route::resource("/admin", "Admin\AdminController");
//后台用户管理
Route::resource("/adminuser","Admin\UsersController");
