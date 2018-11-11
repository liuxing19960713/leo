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
Route::resource("/admin","Admin\AdminController" );
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

