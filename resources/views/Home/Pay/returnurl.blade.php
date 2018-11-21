@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <body>
  <div class="comment-container mb-40"> 
  <div class="single-comment"> 
   <span class="reply-btn"><a href="/">您已成功付款</a></span> 
   <div class="image"> 
    <img src="assets/images/blog-image/comment-icon.png" alt="" /> 
   </div> 
   <div class="content"> 
    <h3 class="user">付款金额：<span class="comment-time">￥{{$list->total}}</span></h3> 
    <p class="comment-text">收货人：{{$list->linkname}}</p>
    <p class="comment-text">联系电话：{{$list->tel}}</p> 
    <p class="comment-text">收货地址：{{$list->address}}</p>
    <p>请认真核对您的收货信息，如有错误请联系客服</p>
     <div class="option"> 
      <span class="info">您可以</span> 
      <a href="/mypersonal" class="J_MakePoint">查看</a><span>已买到的宝贝</span> 
      <a href="/horderinfo/{{$list->id}}" class="J_MakePoint">查看</a> <span>订单详情</span>
     </div> 
   </div> 
  </div>
</div>
 </body>
</html>

@endsection
@section("title","灯饰人生")