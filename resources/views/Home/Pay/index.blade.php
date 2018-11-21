@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <!-- <script src="/js/"></script> -->

  <style>
/*.a{width: 200px;height: 100px;}*/
.stamp {width: 260px;height: 120px;padding: 0 10px;position: relative;overflow: hidden;}
.stamp:before {content: '';position: absolute;top:0;bottom:0;left:10px;right:10px;z-index: -1;}
.stamp:after {content: '';position: absolute;left: 10px;top: 10px;right: 10px;bottom: 10px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.5);z-index: -2;}
.stamp i{position: absolute;left: 25%;top: 45px;height: 200px;width: 270px;background-color: rgba(255,255,255,.15);transform: rotate(-30deg);}
.stamp .par{float: left;padding-left: 8px;width: 110px;border-right:2px dashed rgba(255,255,255,.3);text-align: left;margin-right: 7px;padding-right: 10px;}
.stamp .par p{color:#fff;}
.stamp .par span{font-size: 15px;color:#fff;margin-right: 5px;}
.stamp .par .sign{font-size: 13px;}
.stamp .par sub{position: relative;top:-5px;color:rgba(255,255,255,.8);}
.stamp .copy{display: inline-block;padding:10px 10px;width:100px;vertical-align: text-bottom;font-size: 17px;color:rgb(255,255,255);margin: 0;width: 120px;}
.stamp .copy p{font-size: 16px;margin-top: 4px;}
.stamp p{font-size: 15px;margin-top:5px;}
/*上面是公共的*/

/*第一张*/
.stamp01{background: #F39B00;background: radial-gradient(rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 5px, #F39B00 5px);
  /*background-size: 15px 15px;*/
  cursor: pointer;
  background-position: 9px 3px;}
.stamp01:before{background-color:#F39B00;}

  </style>
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
           <th class="pro-subtotal">小计</th> 
           <th class="pro-remove">配送方式</th> 
          </tr> 
         </thead> 
         <tbody>
        @foreach($info as $key=>$val)
        <tr>
          <td class="pro-thumbnail">
               <a href="single-product.html"><img src="/static/admin/uploads/z_goods/{{$val->z_pic}}" class="img-fluid" alt="Product" /></a>
          </td> 
          <td class="pro-title" width="300px">
              <a href="single-product.html">{{$val->goods_name}}</a>
          </td> 
          <td class="pro-price"><span>￥{{$val->price}}</span></td> 
            
          <td class="quantity">
            {{$val->num}}
          </td>
          <td class="pro-subtotal "><span class="shoptotal">￥{{$total[$key]}}</span>
          </td> 
          <td class="pro-remove">免邮</td> 
        </tr>
        @endforeach
         </tbody> 
        </table> 
       </div> 
       <!--=======  End of cart table  =======--> 
      </form> 
      <div class="row"> 
       <div class="col-lg-6 col-12"> 
        <!--=======  Calculate Shipping  =======--> 

        <div class="myaccount-content"> 
        @if($data)
         @foreach($data as $v)
         <h3>账单地址</h3> 
         <address> <p>收件人：<strong id="linkname">{{$v->linkname}}</strong></p><p>收件地址：{{$v->address}}</p> <p>联系电话：{{$v->phone}}</p> </address> 
         <a href="javscript:void(0);" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>修改地址</a> 
         @endforeach
        @else
         <a href="javscript:void(0);" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>选择默认地址</a>
        @endif
        <button class="btn btn-success" data-toggle="modal" data-target="#mymodal">选择优惠券</button>
        </div>
        <div class="modal fade" id="mymodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- 这是模态框的头 -->
        <div class="modal-header">
        <!-- 关闭modal框的 data-dismiss -->
          
          <h3>选择优惠券</h3>
        </div>
        <div class="modal-body">
            @foreach($demo as $row)
       
        <a class="quanok" href="/pay?minus={{$row->minus}}&did={{$row->did}}" style="float:left;display:inline-block;margin:10px;">
          <div class="stamp stamp01" >
            
            <div class="par" style="margin-top:20px"><p>灯饰人生</p><sub class="sign">￥</sub><span>{{$row->minus}}</span><sub>优惠券</sub><p>订单满{{$row->max}}元</p>
            </div>
          </div>
        </a>
          @endforeach
        </div>
        <div class="modal-footer">
          <button class="btn  btn-info" data-dismiss="modal">关闭</button>
        </div>
      </div>

    </div>
  </div>
        <!--=======  End of Calculate Shipping  =======--> 
        <!--=======  Discount Coupon  =======--> 
       
        <!--=======  End of Discount Coupon  =======--> 
       </div> 
       <div class="col-lg-6 col-12 d-flex"> 
        <!--=======  Cart summery  =======--> 
        <div class="cart-summary"> 
         <div class="cart-summary-wrap dl">  
          <p>小计<span class="total">￥{{session('cart.countprice')}}</span></p> 
          <p>运费<span>￥00.00</span></p>
          <p>优惠<span>￥{{$minus}}</span></p> 
          <h2>总计<span class="count">￥{{$countprice}}</span></h2> 
         </div>
         <div class="cart-summary-button">
          <a href="/pays"  class="checkout-btn" > <button class="update-btn index" id="go">结算</button></a> 
           

         </div> 
        </div> 
        <!--=======  End of Cart summery  =======--> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
   $("#go").click(function()
   {  
      var a = $('#linkname').html();
      if(!a){
        return false;
      }
   });
 </script>
</html>
@endsection
@section("title","灯饰人生")