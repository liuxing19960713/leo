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

//分配权限
	// 轮播图Ajax 修改状态
	Route::get('/wheelsta','Admin\WheelController@Ajax');
	//强结束



	//分配权限

	Route::get("/rolelist/{id}","Admin\AdministratorController@rolelist");

	// 关键词模块
	Route::resource("/key","Admin\KeyWordsController");

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
 //添加快递单号
 Route::get('/courier/{id}',"Admin\OrderController@courier");
 //存入快递单号
 Route::post('/upcourier',"Admin\OrderController@upcourier");

});
// 前台登录
Route::resource("/hlogin","Home\LoginController");
// 前台注册
Route::resource("/hregi","Home\RegisterController");
Route::get("/loginout","Home\LoginController@loginout");

//ajax验证用户是否存在
Route::get("/checkuname","Home\RegisterController@checkuname");

// 接收发来的手机
Route::get("/hsend","Home\RegisterController@send");
//引入验证码
Route::get("/code","Home\LoginController@code");

//检验登录校验码
Route::get("/chvcode","Home\LoginController@chvcode");
//前台首页
Route::resource("/","Home\HomeController");


//用户优惠卷ajax领取
Route::get("/discounta","Home\PersonalController@ajax");

//前台文章栏目
Route::get("/articlehome","Home\HomeController@article");
//前台文章栏目详情
Route::get("/articleshome/{id}","Home\HomeController@articles");



//前台中间件结合路由组使用
Route::group(["middleware"=>"hlogin"],function()
{




//购物车增加数量
Route::get("/addcart","Home\CartController@addcart");
Route::get("/addnum","Home\CartController@addnum");

//购物车减数量
Route::get("/jiancart","Home\CartController@jiancart");
// ajax数量增加
Route::get("ajaxadd","Home\CartController@ajaxadd");
//购物车的删除
Route::get("/cartdel","Home\CartController@cartdel");
// 前台个人用户主页
Route::resource('/mypersonal','Home\PersonalController');
//添加个人收货地址
Route::get('/city','Home\PersonalController@city');

// 个人详细信息
Route::get("/huserinfo/{id}","Home\PersonalController@huserinfo");

//保存个人信息功能
Route::post("/hsaveuser","Home\PersonalController@hsaveuser");

Route::post("/hupuser","Home\PersonalController@hupuser");
//添加个人收货地址
Route::get('/adress','Home\PersonalController@adress');
//处理收货数据
  
  //前台购物车：
Route::resource("/hcart","Home\CartController");
// 检测是否有重复的商品
Route::get("/checkexit","Home\CartController@checkexit");
// 查询购物车里面的信息
Route::get("/select","Home\CartController@select");

//购物车增加数量
Route::get("/addcart","Home\CartController@addcart");
Route::get("/addnum","Home\CartController@addnum");

//购物车减数量
Route::get("/jiancart","Home\CartController@jiancart");
// ajax数量增加
Route::get("/ajaxadd","Home\CartController@ajaxadd");
//总计减少量的量
Route::get("jcart","Home\CartController@jcart");

Route::get("/ajaxjian","Home\CartController@ajaxjian");
//购物车的删除
Route::get("/cartdel","Home\CartController@cartdel");
 
//前台结算页：
Route::resource("/pay","Home\PayController");
// 公告详情
Route::get("/noteinfo/{id}","Home\PersonalController@noteinfo");

//前台评论添加
Route::Resource("/hcomment","Home\CommentController");

//确认收货
Route::get("/confirm/{id}","Home\PersonalController@confirm");

//订单详情
Route::get("/horderinfo/{id}","Home\PersonalController@horderinfo");

//查看物流Logistics
Route::get("/logistics/{id}","Home\PersonalController@logistics");

});
//用户收藏商品
Route::get("/cogoods","Home\PersonalController@cogoods");



//商品详情页
Route::get("/goodinfo/{id}","Home\HomeController@goodinfo");



//商品列表页
Route::get("/search/{id}","Home\HomeController@search");
//购物车增加数量
Route::get("/addcart","Home\CartController@addcart");
Route::get("/addnum","Home\CartController@addnum");

//购物车减数量
Route::get("/jiancart","Home\CartController@jiancart");
// ajax数量增加
Route::get("/ajaxadd","Home\CartController@ajaxadd");
//总计减少量的量
Route::get("jcart","Home\CartController@jcart");

Route::get("/ajaxjian","Home\CartController@ajaxjian");
//购物车的删除
Route::get("/cartdel","Home\CartController@cartdel");
  
//前台结算页：
Route::resource("/pay","Home\PayController");
//支付宝接口调用
Route::get("/pays","Home\PayController@pays");
//通知给客户端的界面
Route::get("/returnurl","Home\PayController@returnurl");


Route::get("/keywords","Home\HomeController@keywords");








