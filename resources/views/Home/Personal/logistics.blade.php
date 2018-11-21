@extends("Home.HomePublic.publics")
@section('home')


<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0" /> 
  <link href="/static/home/order_info/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/order_info/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/order_info/css/personal.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/order_info/css/lostyle.css" rel="stylesheet" type="text/css" /> 
 </head> 
 <body> 
  <div class="center" style="padding-top: 250px"> 
   <div class="col-main"> 
    <div class="main-wrap"> 
     <div class="user-logistics"> 
      <!--标题 --> 
      <div class="am-cf am-padding"> 
       <div class="am-fl am-cf">
        <strong class="am-text-danger am-text-lg">物流跟踪</strong> / 
        <small>Logistics&nbsp;History</small>
       </div> 
      </div> 
      <hr /> 
      <div class="package-title"> 
       <div class="m-item"> 
        <div class="item-pic"> 
         <img src="/static/admin/uploads/z_goods/{{$order->pic}}" class="itempic J_ItemImg" /> 
        </div> 
        <div class="item-info"> 
         <p class="log-status">物流状态:<span>已签收</span> </p> 
         <p>承运公司：{{$order->wl_type}}</p> 
         <p>快递单号：{{$order->wl_code}}</p> 
         <p>官方电话：4001-888-888</p> 
        </div> 
       </div> 
       <div class="clear"></div> 
      </div> 
      <div class="package-status"> 
       <ul class="status-list">
       @foreach($list as $wl) 
        <li class="latest"> <p class="text">{{$wl['remark']}}</p> 
         <div class="time-list"> 
          <span class="date">{{$wl['datetime']}}</span>
         </div> </li> 
        @endforeach
       </ul> 
      </div> 
     </div> 
    </div> 
 
    
   </div> 
  
  </div>  
 </body>
</html>
@endsection
@section('title','灯饰人生')