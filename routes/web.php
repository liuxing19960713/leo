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


//后台首页
// Route::resource("/admin","Admin\AdminController" );
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




//后台用户管理
Route::resource("/adminuser","Admin\UserController");
//后台管理员用户管理
Route::resource("/administrator","Admin\AdministratorController");
//后台管理员ajax删除
Route::get("/administratordel","Admin\AdministratorController@del");
//后台订单管理
Route::resource("/order","Admin\OrderController");
//后台订单状态ajax修改
Route::get("/orderAjax","Admin\OrderController@Ajax");

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
