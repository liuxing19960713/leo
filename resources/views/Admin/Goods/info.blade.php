@extends('Admin.AdminPublic.publics')

@section('admin')
<html>
 <head></head>
 <body>
  <div class="card">
   <div class="card-body">
    <h4 class="card-title mdi mdi-nature">商品详情</h4>

    <div class="d-flex">
     <div class="d-flex align-items-center mr-4 text-muted font-weight-light">
      <i class="mdi mdi-account-outline icon-sm mr-2"></i>
      <span>{{$info->commpany}}</span>
     </div>
     <div class="d-flex align-items-center text-muted font-weight-light">
      <i class="mdi mdi-clock icon-sm mr-2"></i>
      <span>{{$info->created_at}}</span>
     </div>
    </div>

    <!-- 商品主图 -->
    <div class="row mt-3">
     <div class="col-4 pr-6">
      <img src="/static/admin/uploads/z_goods/{{$info->z_pic}}" class="mw-100 w-50 rounded"  alt="image" />
     </div>
    </div>



    <!-- 商品图片集 -->
    <div class="row mt-3">
    @foreach($pic as $p)
     <div class="col-4 pr-6">
      <img src="/static/admin/uploads/goods/{{$p}}" class="mw-100 w-50 rounded"  alt="image" />
     </div>
    @endforeach
    </div>

    <!-- 商品详情 -->
    <div class="d-flex mt-5 align-items-top">
     <div class="mb-0 flex-grow">
      <h5 class="mr-2 mb-2 mdi mdi-record">{{$info->goods_name}}</h5>
      <p class="mb-0 font-weight-light mdi mdi-polaroid">{{$info->desrc}}</p>
      <p style="padding-top: 20px"><i class="mb-0 font-weight-light mdi mdi-square-inc-cash">{{$info->price}}</i></p>

     </div>
     <div class="ml-auto">
      <i class="mdi mdi-heart-outline text-muted"></i>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生--商品详情')
