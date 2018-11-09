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
//后台登录和退出
Route::resource("/adminlogin","Admin\AdminloginController");
//中间件结合路由组使用
Route::group(["middleware"=>"adminlogin"],function()
{
	//后台首页
	Route::resource("/admin","Admin\AdminController" );
	//公司模块
	Route::resource("/company","Admin\CompanyController");
	//广告
	Route::resource("/adver","Admin\AdverController");
});
//前台首页
Route::resource("/home","Home\HomeController");


