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


	// 优惠券模块
	Route::resource("/discount","Admin\DiscountController");
	// 优惠券模块状态ajax
	Route::get("/discountsta",'Admin\DiscountController@sta');
	// 用户拥有优惠券详情
	Route::resource('/discountlog','Admin\DiscountLogController');
  //文章管理
  Route::resource('/article','Admin\ArticleController');
  //文章ajax删除
  Route::get('/articledel',"Admin\ArticleController@del");
  //文章状态ajax修改)
  Route::get('/articleajax',"Admin\ArticleController@ajax");


});
//前台首页
Route::resource("/","Home\HomeController");
//前台文章栏目
Route::get("/articlehome","Home\HomeController@article");
//前台文章栏目详情
Route::get("/articleshome/{id}","Home\HomeController@articles");

// 前台登录
Route::resource("/hlogin","Home\LoginController");
// 前台注册
Route::resource("/hregi","Home\RegisterController");

//ajax验证用户是否存在
Route::get("/checkuname","Home\RegisterController@checkuname");

// 接收发来的手机
Route::get("/hsend","Home\RegisterController@send");

//商品详情页
Route::get("/goodinfo/{id}","Home\HomeController@goodinfo");
//商品详情页
Route::get("/search/{id}","Home\HomeController@search");

//引入验证码
Route::get("/code","Home\LoginController@code");

//检验登录校验码
Route::get("/chvcode","Home\LoginController@chvcode");

// 前台个人用户主页
Route::resource('/mypersonal','Home\PersonalController');
//添加个人收货地址
Route::get('/adress','Home\PersonalController@adress');
//处理收货数据
