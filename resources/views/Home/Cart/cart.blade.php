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
	           	 <a href="single-product.html"><img src="" class="img-fluid" alt="Product" /></a>
	        </td> 
	        <td class="pro-title">
		          <a href="single-product.html">{{$r->goods_name}}</a>
	        </td> 
	           <td class="pro-price"><span>${{$r->price}}</span></td> 
	           <td class="quantity">
	           	 <a href="/addcart?id={{$r->id}}"   style="position: relative;left: -44px;top: 22px">+</i></a>
	           	 <!-- <button  class="jia" value="{{$r->id}}" style="margin-right:120px;position: relative;top: 22px" >+</button>  -->
				 <input type="text" value="{{$r->num}}" style="width: 50px"/> 
	             <a href="/jiancart/?id={{$r->id}}"  class="jian" style="position: relative;left: 41px;top: -23px">-</a>
	            <!-- <button  class="jian" value="{{$r->id}}" style="padding-top: ">-</button>  -->
	         </td> 
	           <td class="pro-subtotal "><span class="shoptotal">{{$r->total}}</span>
	           </td> 
	           <!-- <input type="hidden" class="goods" name="goodsid" value="{{$r->id}}">  -->

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
        <!--=======  Calculate Shipping  =======--> 
       	 <!--  <div class="myaccount-content"> 
			   <h3>Billing Address</h3> 
			   <address> <p><strong>Alex Tuntuni</strong></p> <p>1355 Market St, Suite 900 <br /> San Francisco, CA 94103</p> <p>Mobile: (123) 456-7890</p> </address> 
			   <a href="javscript:void(0);" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>Edit Address</a> 
  		  </div> -->
        <!--=======  End of Calculate Shipping  =======--> 
        <!--=======  Discount Coupon  =======--> 
       
        <!--=======  End of Discount Coupon  =======--> 
       </div> 
       <div class="col-lg-6 col-12 d-flex"> 
        <!--=======  Cart summery  =======--> 
        <div class="cart-summary"> 
         <div class="cart-summary-wrap dl"> 
          <h4>Cart Summary</h4> 
          @if(!empty($countprice))
          <p>Sub Total <span class="total">${{$countprice}}</span></p> 
          <p>Shipping Cost <span>$00.00</span></p> 
          <h2>Grand Total <span class="count">${{$countprice}}</span></h2> 
          @else
            <p>Sub Total  <span>$00.00</span></p> 
              <h2>Grand Total <span>$00.00</span></h2> 
         @endif
         </div> 
         <div class="cart-summary-button">
          <button class="checkout-btn">Checkout</button> 
           <a href="/" class="checkout-btn"> <button class="update-btn index">继续购物</button></a> 
         <!-- 继续购物  -->
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
	// $(".jian").click(function(){
	// 	// id = $(".goods").val();
	// 	id =  $(this).val();
	// 	alert(id);
	// })
	
	// //
	// $(".jia").click(function(){
	// 	num = $(this).next().val();
	// 	nums = $(this).next().val();
	// 	$.get("/addnum",{num:num},function(res){
	// 		num = tirm(res);
	// 		alert(num);
	// 		// newData=res.replace(/\s/g,'');
	// 	 // 	nums = newData;
	// 	 // 	num = nums;
	// 	 	// alert(newData);
	// 	});
	// })

	// $(".jia").click(function(){
	// 	id =  $(this).val();
	// 	// alert(id);
	// 		$.get("/ajaxadd",{id:id},function(result){
	// 			// alert(result);

	// 		});
	// });

 	// $(".jiahao").click(function(){
 	// 	// 获取id
 	//    var id = $("input[name='id']").val();
 	//    tt = $(".shoptotal");
 	//    ct = $(".count");
 	// 	$.ajax({
 	// 		type:"get",
 	// 		url:"/addcart",
 	// 		data:{id:id},
 	// 		// dataType:'json',
 	// 		success:function(data){
 	// 			total = data;
 	// 			// shopprice = $(".shoptotal").html();
 	// 			// newData=data.replace(/\s/g,'');
 				 
 	// 			shopprice = tt.html(data);
 				 
 		 


 	// 		},
 	// 		error:function(data){
 	// 			alert('添加错误');
 	// 		}
 	// 	});
 	

	 // $.get("./a.php",{phone:phone},function(data){
	 //    alert(data.code);
	   	

	 //  },'json');

 	// });

 	

  
  </script>
 </body>
</html>
@endsection
@section("title","灯饰人生--购物车")