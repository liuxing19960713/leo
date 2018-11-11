@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="row"> 
   <div class="col-12"> 
    <span class="d-flex align-items-center  btn btn-gradient-danger btn-fw"> <p>欢迎{{session('name')}}来到灯饰人生后台管理系统</p> </span> 
   </div> 
  </div> 
  <div class="page-header"> 
   <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white mr-2"> <i class="mdi mdi-home"></i> </span> 后台首页 </h3> 
   <nav aria-label="breadcrumb"> 
    <ul class="breadcrumb"> 
     <li class="breadcrumb-item active" aria-current="page"> <span></span>概况 <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i> </li> 
    </ul> 
   </nav> 
  </div> 
  <div class="row"> 
   <div class="col-md-4 stretch-card grid-margin"> 
    <div class="card bg-gradient-danger card-img-holder text-white"> 
     <div class="card-body"> 
      <img src="/static/admins/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> 
      <h4 class="font-weight-normal mb-3">每周销售 <i class="mdi mdi-chart-line mdi-24px float-right"></i> </h4> 
      <h2 class="mb-5">$ 15,0000</h2> 
      <h6 class="card-text">增加 60%</h6> 
     </div> 
    </div> 
   </div> 
   <div class="col-md-4 stretch-card grid-margin"> 
    <div class="card bg-gradient-info card-img-holder text-white"> 
     <div class="card-body"> 
      <img src="/static/admins/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> 
      <h4 class="font-weight-normal mb-3">每周订单 <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i> </h4> 
      <h2 class="mb-5">45,6334</h2> 
      <h6 class="card-text">减少 10%</h6> 
     </div> 
    </div> 
   </div> 
   <div class="col-md-4 stretch-card grid-margin"> 
    <div class="card bg-gradient-success card-img-holder text-white"> 
     <div class="card-body"> 
      <img src="/static/admins/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" /> 
      <h4 class="font-weight-normal mb-3">在线访客 <i class="mdi mdi-diamond mdi-24px float-right"></i> </h4> 
      <h2 class="mb-5">95,5741</h2> 
      <h6 class="card-text">增加 5%</h6> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="row"> 
   <div class="col-md-7 grid-margin stretch-card"> 
    <div class="card"> 
     <div class="card-body"> 
      <div class="clearfix"> 
       <h4 class="card-title float-left">访问和销售统计</h4> 
       <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div> 
      </div> 
      <canvas id="visit-sale-chart" class="mt-4"></canvas> 
     </div> 
    </div> 
   </div> 
   <div class="col-md-5 grid-margin stretch-card"> 
    <div class="card"> 
     <div class="card-body"> 
      <h4 class="card-title">流向来源</h4> 
      <canvas id="traffic-chart"></canvas> 
      <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <div class="row"> 
   <div class="col-12 grid-margin"> 
    <div class="card"> 
     <div class="card-body"> 
      <h4 class="card-title">管理员</h4> 
      <div class="table-responsive"> 
       <table class="table"> 
        <thead> 
         <tr> 
          <th> 管理员 </th> 
          <th> 权限 </th> 
          <th> 状态 </th> 
          <th> 创建时间 </th> 
         </tr> 
        </thead> 
        <tbody> 
         <tr> 
          <td> <img src="/static/admins/images/faces/face1.jpg" class="mr-2" alt="image" /> David Grey </td> 
          <td> Fund is not recieved </td> 
          <td> <label class="badge badge-gradient-success">DONE</label> </td> 
          <td> Dec 5, 2017 </td> 
         </tr> 
         <tr> 
          <td> <img src="/static/admins/images/faces/face2.jpg" class="mr-2" alt="image" /> Stella Johnson </td> 
          <td> High loading time </td> 
          <td> <label class="badge badge-gradient-warning">PROGRESS</label> </td> 
          <td> Dec 12, 2017 </td> 
         </tr> 
         <tr> 
          <td> <img src="/static/admins/images/faces/face3.jpg" class="mr-2" alt="image" /> Marina Michel </td> 
          <td> Website down for one week </td> 
          <td> <label class="badge badge-gradient-info">ON HOLD</label> </td> 
          <td> Dec 16, 2017 </td> 
         </tr> 
         <tr> 
          <td> <img src="/static/admins/images/faces/face4.jpg" class="mr-2" alt="image" /> John Doe </td> 
          <td> Loosing control on server </td> 
          <td> <label class="badge badge-gradient-danger">REJECTED</label> </td> 
          <td> Dec 3, 2017 </td> 
         </tr> 
        </tbody> 
       </table> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
 </body>
</html>
@endsection
@section('title','灯饰人生--后台管理系统')