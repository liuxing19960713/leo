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
	//公告
	Route::resource("/notice","Admin\NoticeController");
	//模型管理
	Route::resource('/auth',"Admin\AuthController");

  //伟强
  //模型友情链接
  Route::resource('/link','Admin\LinkController');
  //Ajax 更改友情链接状态 路由
  Route::get('/linkss','Admin\LinkController@Ajax');
  //评论
  Route::resource('/comment','Admin\CommentController');
  // 评论ajax删除
  Route::get('/commentdel','Admin\CommentController@Ajax');
  //回复评论主页
  Route::resource('/recomment','Admin\Re_CommentController');
  //回复评论ajax 删除
  Route::get('/recommentdel','Admin\Re_CommentController@Ajax');
  //回复评论添加
  Route::get('/recommentinsert/{id}','Admin\Re_CommentController@insert');
  Route::post('/recommentinsert/{id}','Admin\Re_CommentController@up');
  // 轮播图的路由
  Route::resource('/wheel','Admin\WheelController');
  // 轮播图Ajax 修改状态
  Route::get('/wheelsta','Admin\WheelController@Ajax');
//强结束

	//分配权限
	Route::get("/rolelist/{id}","Admin\AdministratorController@rolelist");
	// 保存分配权限信息
	Route::post("/save_rolelist","Admin\AdministratorController@save_rolelist");

  
  

});
//前台首页
Route::resource("/","Home\HomeController");
//关于我们
Route::resource("/contact","Home\ContactController");