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


 
// 后台商品
Route::resource("/agoods","Admin\GoodsController");
// 商品ajax删除
Route::get('/agdel',"Admin\GoodsController@agdel");
// 后台分类
Route::Resource("/acate","Admin\CategoryController");
// 分类ajax删除
Route::get('/acadel',"Admin\CategoryController@acadel");

