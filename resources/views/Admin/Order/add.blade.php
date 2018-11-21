@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">快递单号添加</h4> 
    <p class="card-description"> Basic form elements </p> 
    <form class="forms-sample" action="/upcourier" method="post">
    {{csrf_field()}} 
     <div class="form-group"> 
      <label for="exampleInputName1">订单号</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="订单号" name="order_code" value="{{$order->order_code}}" /> 
     </div> 
     <div class="form-group"> 
      <label for="exampleInputEmail3">快递公司编码</label> 
      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="快递类型" name="wl_type" /> 
     </div> 
     <div class="form-group"> 
      <label for="exampleInputPassword4">快递单号</label> 
      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="快递单号" name="wl_code" /> 
     </div> 
     
      
    
     <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button> 
     <button class="btn btn-light">Cancel</button> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生--模块的添加')
