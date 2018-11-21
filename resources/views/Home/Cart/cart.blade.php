@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <!-- <script src="/js/"></script> -->
  <script src="/static/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="page-section mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-12"> 
      <form action="#"> 
       <!--=======  cart table  =======--> 
       <div class="cart-table table-responsive mb-40"> 
        <table class="table"> 
         <thead> 
          <tr> 
           <th class="pro-thumbnail">产品图</th> 
           <th class="pro-title">购买产品</th> 
           <th class="pro-price">价格</th> 
           <th class="pro-quantity">数量</th> 
           <th class="pro-subtotal">总价</th> 
           <th class="pro-remove">删除</th> 
          </tr> 
         </thead> 
         <tbody>
          @if(!empty($info))
		  @foreach($info as $key=>$r)
		  <tr>
	        <td class="pro-thumbnail">
	           	 <a href="single-product.html"><img src="/static/admin/uploads/z_goods/{{$r->z_pic}}" class="img-fluid" alt="Product" /></a>
	        </td> 
	        <td class="pro-title" width="500px">
		          <a href="single-product.html">{{$r->goods_name}}</a>
	        </td> 
	           <td class="pro-price"><span>${{$r->price}}</span></td> 
	           <td class="quantity">
	           	 <a href="/addcart?id={{$r->id}}"><input class="add am-btn" name="" type="button" value="+" /></a>
				       <input type="text" value="{{$r->num}}" style="width: 50px"/> 
               <a href="/jiancart/?id={{$r->id}}"><input class="add am-btn" name="" type="button" value="-" /></a>
	            
	         </td> 
	           <td class="pro-subtotal "><span class="shoptotal">{{$r->total}}</span>
	           </td> 
	           

	           <td class="pro-remove"><a href="/cartdel?id={{$r->id}}"><i class="fa fa-trash-o"></i></a></td> 
          </tr>
       
		  @endforeach
		  @else
		  	暂无商品
		  @endif
         </tbody> 
        </table> 
       </div> 
       <!--=======  End of cart table  =======--> 
      </form> 
      <div class="row"> 
       <div class="col-lg-6 col-12"> 
        
       </div> 
       <div class="col-lg-6 col-12 d-flex"> 
        <!--=======  Cart summery  =======--> 
        <div class="cart-summary">
         @if(!empty(session('cart.html')))
         <div class="cart-summary-wrap dl"> 
          <h4>Cart Summary</h4> 
          
          <p>小计<span class="total">￥{{$countprice}}</span></p> 
          <p>运费<span>￥00.00</span></p> 
          <h2>总计 <span class="count">￥{{$countprice}}</span></h2> 
         </div> 
         <div class="cart-summary-button">
          <a href="/pay" class="checkout-btn"> <button class="update-btn index">提交订单</button></a>  
           <a href="/" class="checkout-btn"> <button class="update-btn index">继续购物</button></a> 
         <!-- 继续购物  -->
         </div>
         @endif 
        </div> 
        <!--=======  End of Cart summery  =======--> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section("title","灯饰人生--购物车")