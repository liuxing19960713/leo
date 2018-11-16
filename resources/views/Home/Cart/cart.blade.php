@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
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
		  @foreach($info as $r)
		
           <td class="pro-thumbnail"><a href="single-product.html"><img src="/static/admin/uploads/z_goods/{{$r->z_pic}}" class="img-fluid" alt="Product" /></a></td> 
           <td class="pro-title"><a href="single-product.html">{{$r->goods_name}}</a></td> 
           <td class="pro-price"><span>${{$r->price}}</span></td> 
           <td class="pro-quantity">
            <div class="pro-qty">
             <input type="text" value="{{$r->num}}" />
             <a href="#" class="inc qty-btn"><i class="fa fa-angle-up"></i></a>
             <a href="#" class="dec qty-btn"><i class="fa fa-angle-down"></i></a>
            </div></td> 
           <td class="pro-subtotal"><span>${{$r->total}}</span></td> 
           <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td> 
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
        <!--=======  Calculate Shipping  =======--> 
       	  <div class="myaccount-content"> 
			   <h3>Billing Address</h3> 
			   <address> <p><strong>Alex Tuntuni</strong></p> <p>1355 Market St, Suite 900 <br /> San Francisco, CA 94103</p> <p>Mobile: (123) 456-7890</p> </address> 
			   <a href="#" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>Edit Address</a> 
  		  </div>
        <!--=======  End of Calculate Shipping  =======--> 
        <!--=======  Discount Coupon  =======--> 
       
        <!--=======  End of Discount Coupon  =======--> 
       </div> 
       <div class="col-lg-6 col-12 d-flex"> 
        <!--=======  Cart summery  =======--> 
        <div class="cart-summary"> 
         <div class="cart-summary-wrap"> 
          <h4>Cart Summary</h4> 
          @if(!empty($countprice))
          <p>Sub Total <span>${{$countprice}}</span></p> 
          <p>Shipping Cost <span>$00.00</span></p> 
          <h2>Grand Total <span>${{$countprice}}</span></h2> 
          @else
            <p>Sub Total  <span>$00.00</span></p> 
              <h2>Grand Total <span>$00.00</span></h2> 
         @endif
         </div> 
         <div class="cart-summary-button"> 
          <button class="checkout-btn">Checkout</button> 
          <button class="update-btn index">继续购物</button> 
         </div> 
        </div> 
        <!--=======  End of Cart summery  =======--> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div>
  <script>
  	$(".index").click(function(){

  	})
  </script>
 </body>
</html>
@endsection
@section("title","灯饰人生--购物车")