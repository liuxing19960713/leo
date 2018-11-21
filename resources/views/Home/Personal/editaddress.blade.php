@extends("Home.HomePublic.publics")
@section('home')

  <html>
 <head></head>
 <body>
  <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <div class="breadcrumb-container">
       <ul>
        <li><a href="/mypersonal">个人首页</a> <span class="separator">/</span></li>
        <li class="active">地址管理</li>
       </ul>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="page-section mb-80">
   <div class="container">
    <div class="row">
     <div class="col-12">
      <!-- Checkout Form s-->
      <form action="/haddressupdate/{{$aid}}" class="checkout-form" method="post">
       <div class="row row-40">
        <div class="col-lg-7 mb-20">
         <!-- Billing Address -->
         <div id="billing-form" class="mb-40">
          <h4 class="checkout-title">添加收货地址</h4>
          <div class="row">
           <div class="col-md-6 col-12 mb-20">
            <label>收货人</label>
            <input type="text" placeholder="收货人名称" name="linkname" value="{{$address->linkname}}" required="required"/>
           </div>

           <div class="col-md-6 col-12 mb-20">
            <label>邮编地址</label>
            <input type="number" placeholder="邮编" oninput="if(value.length>6)value=value.slice(0,6)" name="mailbox" value="{{$address->mailbox}}" required="required"/>
           </div>
           <div class="col-12 mb-20">
            <label>电话号码</label>

            <input type="telephone" name="phone"  required pattern="^(0|86|17951)?(13[0-9]|15[012356789]|17[0678]|18[0-9]|14[57])[0-9]{8}" placeholder="电话号码" value="{{$address->phone}}" required="required" />
           </div>

        <div class="col-12 mb-20">
            <label>收货地址</label>

            <input type="telephone" name="address"  required="required"  placeholder="详细地址(小区名,栋号,房号)" value="{{$address->address}}" required="required">
        </div>

  <input type="hidden" name="uid" value="{{session('hid')}}">
        {{csrf_field()}}


          <button type="submit" class="place-order sub">提交</button>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
          <button type="reset" class="place-order">重置</button>
           </div>
          </div>
         </div>



       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </body>
 <script>

 </script>
</html>

@endsection
@section('title','灯饰人生')
