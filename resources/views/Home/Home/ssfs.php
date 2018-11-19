//购物车增加数量
Route::get("/addcart","Home\CartController@addcart");
Route::get("/addnum","Home\CartController@addnum");

//购物车减数量
Route::get("/jiancart","Home\CartController@jiancart");
// ajax数量增加
Route::get("ajaxadd","Home\CartController@ajaxadd");
//购物车的删除
Route::get("/cartdel","Home\CartController@cartdel");