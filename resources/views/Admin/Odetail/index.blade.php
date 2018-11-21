@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-lg-18 grid-margin stretch-card"> 
   <div class="card"> 
    <div class="card-body"> 
     <h4 class="card-title">订单详情</h4> 
     <p class="card-description"></p> 
     <table class="table table-hover"> 
      <thead> 
       <tr> 
        <th>商品图片</th> 
        <th>商品数量</th>
        <th>价格</th>
        <th>商品名字</th>
       </tr> 
      </thead> 
      <tbody> 
       <tr> 
        <td>{{$data->pic}}</td>
        <td>{{$data->onum}}</td>
        <td>{{$data->price}}</td>
        <td>{{$data->gname}}</td>
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','订单详情')