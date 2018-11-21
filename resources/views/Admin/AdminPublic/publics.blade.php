<!DOCTYPE html>
<html lang="en">

 <head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/static/admins/vendors/iconfonts/mdi/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="/static/admins/vendors/css/vendor.bundle.base.css" />


  <!-- 分页样式 -->
  <link rel="stylesheet" href="/static/admins/css/mypage.css" />

  <!-- jq引入-->
 <script src="/static/admins/js/jquery-mini.js"></script>

  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/static/admins/css/style.css" />
  <!-- endinject -->
  <link rel="shortcut icon" href="/static/admins/images/favicon.png" />
  <!--分页样式-->
  <link rel="stylesheet" type="text/css" href="/static/admins/mypage.css"/>
  <!-- 分页样式结束 -->
 </head>
 <body>
  <div class="container-scroller">
   <!-- partial:partials/_navbar.html -->
   <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
     <a class="navbar-brand brand-logo" href="index.html"><img src="/static/admins/images/logo.svg" alt="logo" /></a>
     <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/static/admins/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
     <div class="search-field d-none d-md-block">

     </div>
     <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown"> <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
        <div class="nav-profile-img">
         <img src="/static/admins/images/faces/face1.jpg" alt="image" />
         <span class="availability-status online"></span>
        </div>
        <div class="nav-profile-text">
         <p class="mb-1 text-black">{{session('name')}}</p>
        </div> </a>
       <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="/adminlogin/create"> <i class="mdi mdi-logout mr-2 text-primary"></i> 退出 </a>
       </div> </li>
      <li class="nav-item d-none d-lg-block full-screen-link"> <a class="nav-link"> <i class="mdi mdi-fullscreen" id="fullscreen-button"></i> </a> </li>
    </div>
   </nav>
   <!-- partial -->
   <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
      <li class="nav-item nav-profile"> <a href="#" class="nav-link">
        <div class="nav-profile-image">
         <img src="/static/admins/images/faces/face1.jpg" alt="profile" />
         <span class="login-status online"></span>
         <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
         <span class="font-weight-bold mb-2">{{session('name')}}</span>
         <span class="text-secondary text-small">Project Manager</span>
        </div> <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> </a> </li>
      <li class="nav-item"> <a class="nav-link" href="/admin"> <span class="menu-title">后台首页</span> <i class="mdi mdi-home menu-icon"></i> </a> </li>
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic"> <span class="menu-title">用户管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-account menu-icon"></i> </a>
       <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/adminuser">用户列表</a></li>
        </ul>
       </div> </li>
      <li class="nav-item"> <a class="nav-link" href="#gly" aria-expanded="false" aria-controls="gly" data-toggle="collapse"> <span class="menu-title">管理员管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-contacts menu-icon"></i> </a>
       <div class="collapse" id="gly">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/administrator">管理员列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/administrator/create">管理员添加</a></li>
        </ul>
       </div> </li>


       <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#mokuai" aria-expanded="false" aria-controls="mokuai"> <span class="menu-title">模块管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-account-network menu-icon"></i> </a>
       <div class="collapse" id="mokuai">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/auth">模块列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/auth/create">模块添加</a></li>

        </ul>
       </div>
      </li>



      <li class="nav-item"> <a class="nav-link" href="#fenlei" aria-expanded="false" aria-controls="fenlei" data-toggle="collapse"> <span class="menu-title">分类管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-format-list-bulleted menu-icon"></i> </a>
       <div class="collapse" id="fenlei">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/acate">分类列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/acate/create">分类添加</a></li>
        </ul>
       </div> </li>
        <!--  <li class="nav-item"> <a class="nav-link" href="#fenlei" aria-expanded="false" aria-controls="fenlei" data-toggle="collapse"> <span class="menu-title">关键词模块</span> <i class="menu-arrow"></i> <i class="mdi mdi-format-list-bulleted menu-icon"></i> </a>
       <div class="collapse" id="fenlei">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/acate">关键词列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/key/create">关键词更新</a></li>
        </ul>
       </div> </li> -->
      <li class="nav-item"> <a class="nav-link" href="#shop" aria-expanded="false" aria-controls="shop" data-toggle="collapse"> <span class="menu-title">商品管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-shopping menu-icon"></i> </a>
       <div class="collapse" id="shop">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/agoods">商品列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/agoods/create">商品添加</a></li>
        </ul>
       </div>
     </li>

     <li class="nav-item"> <a class="nav-link" href="#discount" aria-expanded="false" aria-controls="discount" data-toggle="collapse"> <span class="menu-title">优惠券</span> <i class="menu-arrow"></i> <i class="mdi mdi-shopping menu-icon"></i> </a>
       <div class="collapse" id="discount">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/discount">优惠券列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/discount/create">优惠券添加</a></li>
         <li class="nav-item"> <a class="nav-link" href="/discountlog">用户优惠券详情</a></li>
        </ul>
       </div>
     </li>


      <li class="nav-item"> <a class="nav-link" href="#order" aria-expanded="false" aria-controls="order" data-toggle="collapse"> <span class="menu-title">订单管理</span> <i class="menu-arrow"></i> <i class="mdi mdi mdi-square-inc-cash menu-icon"></i> </a>
       <div class="collapse" id="order">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/order">订单列表</a></li>
        </ul>
       </div> </li>


      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#lunbo" aria-expanded="false" aria-controls="lunbo"> <span class="menu-title">轮播图管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-xaml menu-icon"></i> </a>
       <div class="collapse" id="lunbo">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/wheel">轮播图列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/wheel/create">轮播图添加</a></li>
        </ul>
       </div> </li>



      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#guanggao" aria-expanded="false" aria-controls="guanggao"> <span class="menu-title">广告管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-lumx menu-icon"></i> </a>
       <div class="collapse" id="guanggao">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/adver">广告列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/adver/create">广告添加</a></li>
        </ul>
       </div> </li>
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#company" aria-expanded="false" aria-controls="company"> <span class="menu-title">公司管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-polymer menu-icon"></i> </a>
       <div class="collapse" id="company">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/company">公司列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/company/create">公司添加</a></li>

        </ul>
       </div> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#friendship" aria-expanded="false" aria-controls="friendship"> <span class="menu-title">友情链接管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-medical-bag menu-icon"></i> </a>
       <div class="collapse" id="friendship">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/link">友情链接列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/link/create">友情链接添加</a></li>
        </ul>
       </div> </li>

      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#comment" aria-expanded="false" aria-controls="comment"> <span class="menu-title">评论管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-new-box menu-icon"></i> </a>
       <div class="collapse" id="comment">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/comment">评论列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/recomment">回复列表</a></li>
        </ul>
       </div>
     </li>

      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#notice" aria-expanded="false" aria-controls="notice"> <span class="menu-title">公告管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-vector-point menu-icon"></i> </a> 
       <div class="collapse" id="notice"> 
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/notice">公告列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/notice/create">公告添加</a></li>
        </ul>
       </div> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#article" aria-expanded="false" aria-controls="article"> <span class="menu-title">文章管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-new-box menu-icon"></i> </a>
       <div class="collapse" id="article">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="/article">文章列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/article/create">文章添加</a></li>
        </ul>
       </div>
     </li>
     </ul> 
    </nav> 
    <!-- partial --> 
    <div class="main-panel"> 

     <div class="content-wrapper">

     <div id="mws-container" class="clearfix">
      @if(count($errors)>0)
      <div class="mws-form-message warning">
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        </div>
        @endif
      @if(session('success'))

    <!-- 错误提示信息结束 -->

     <a href="javascript:void(0)" class="d-flex align-items-center  btn btn-gradient-danger btn-fw" id="success">
        {{session('success')}}
      </a>
      @endif
      @if(session('error'))
      <a href="javascript:void(0)" class="mws-form-message error btn btn-gradient-danger btn-fw" id="error">
          {{session('error')}}
      </a>
      @endif
      @section('admin')

      @show
     <!-- content-wrapper ends -->
     <!-- partial:partials/_footer.html -->
    </div>
     <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
       <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 BootstrapDash. All rights reserved.</span>
       <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">联系电话<i class="mdi mdi-heart text-danger"></i> - 15518564257<a href="" target="_blank">广州灯饰人生有限公司</a></a></span>
      </div>
     </footer>
     <!-- partial -->

    <!-- main-panel ends -->
   </div>
   <!-- page-body-wrapper ends -->

  <script type="text/javascript">
    $("#success").click(function(){
      $("#success").remove();
    });
    $("#error").click(function(){
      $("#error").remove();
    });

  </script>



  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/static/admins/vendors/js/vendor.bundle.base.js"></script>
  <script src="/static/admins/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/static/admins/js/off-canvas.js"></script>
  <script src="/static/admins/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->


  <script src="/static/admins/js/dashboard.js"></script>
  <!-- 校验类点击消失js -->
  <script src="/static/admins/js/core/mws.js"></script>
  <!-- End custom js for this page-->

 </body>
</html>
