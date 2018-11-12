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
	//后台管理员用户管理
	Route::resource("/administrator","Admin\AdministratorController");

	//后台用户管理
	Route::resource("/adminuser","Admin\UserController");

	//后台订单管理
	Route::resource("/order","Admin\OrderController");
	//后台订单状态ajax修改
	Route::get("/orderAjax","Admin\OrderController@Ajax");

	//后台管理员ajax删除
	Route::get("/administratordel","Admin\AdministratorController@del");
	
	// 后台商品
	Route::resource("/agoods","Admin\GoodsController");


	// 商品ajax删除
	Route::get('/agdel',"Admin\GoodsController@agdel");

	// 后台分类
	Route::Resource("/acate","Admin\CategoryController");

	// 分类ajax删除
	Route::get('/acadel',"Admin\CategoryController@acadel");
	
	//公司模块
	Route::resource("/company","Admin\CompanyController");
	//广告
	Route::resource("/adver","Admin\AdverController");

	//模型管理
	Route::resource('/auth',"Admin\AuthController");

	//分配权限
	Route::get("/rolelist/{id}","Admin\AdministratorController@rolelist");
	// 保存分配权限信息
	Route::post("/save_rolelist","Admin\AdministratorController@save_rolelist");

  
  

});
//前台首页
Route::resource("/home","Home\HomeController");


 
