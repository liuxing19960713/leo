<!DOCTYPE html>
<html lang="en">
 <head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script> 
  <!-- Required meta tags --> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> 
  <title>@yield('title')</title> 
  <!-- plugins:css --> 
  <link rel="stylesheet" href="/static/admins/vendors/iconfonts/mdi/css/materialdesignicons.min.css" /> 
  <link rel="stylesheet" href="/static/admins/vendors/css/vendor.bundle.base.css" />
  <!-- endinject --> 
  <!-- inject:css --> 
  <link rel="stylesheet" href="/static/admins/css/style.css" /> 
  <!-- endinject --> 
  <link rel="shortcut icon" href="/static/admins/images/favicon.png" />
  <!--分页样式-->
  <link rel="stylesheet" type="text/css" href="/static/admins/mypage.css"/> 
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
      <form class="d-flex align-items-center h-100" action="#"> 
       <div class="input-group"> 
        <div class="input-group-prepend bg-transparent"> 
         <i class="input-group-text border-0 mdi mdi-magnify"></i> 
        </div> 
        <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects" /> 
       </div> 
      </form> 
     </div> 
     <ul class="navbar-nav navbar-nav-right"> 
      <li class="nav-item nav-profile dropdown"> <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> 
        <div class="nav-profile-img"> 
         <img src="/static/admins/images/faces/face1.jpg" alt="image" /> 
         <span class="availability-status online"></span> 
        </div> 
        <div class="nav-profile-text"> 
         <p class="mb-1 text-black">David Greymaax</p> 
        </div> </a> 
       <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown"> 
        <a class="dropdown-item" href="#"> <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a> 
        <div class="dropdown-divider"></div> 
        <a class="dropdown-item" href="#"> <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a> 
       </div> </li> 
      <li class="nav-item d-none d-lg-block full-screen-link"> <a class="nav-link"> <i class="mdi mdi-fullscreen" id="fullscreen-button"></i> </a> </li> 
      <li class="nav-item dropdown"> <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="mdi mdi-email-outline"></i> <span class="count-symbol bg-warning"></span> </a> 
       <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown"> 
        <h6 class="p-3 mb-0">Messages</h6> 
        <div class="dropdown-divider"></div> 
        <a class="dropdown-item preview-item"> 
         <div class="preview-thumbnail"> 
          <img src="/static/admins/images/faces/face4.jpg" alt="image" class="profile-pic" /> 
         </div> 
         <div class="preview-item-content d-flex align-items-start flex-column justify-content-center"> 
          <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6> 
          <p class="text-gray mb-0"> 1 Minutes ago </p> 
         </div> </a> 
        <div class="dropdown-divider"></div> 
        <a class="dropdown-item preview-item"> 
         <div class="preview-thumbnail"> 
          <img src="/static/admins/images/faces/face2.jpg" alt="image" class="profile-pic" /> 
         </div> 
         <div class="preview-item-content d-flex align-items-start flex-column justify-content-center"> 
          <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6> 
          <p class="text-gray mb-0"> 15 Minutes ago </p> 
         </div> </a> 
        <div class="dropdown-divider"></div> 
        <a class="dropdown-item preview-item"> 
         <div class="preview-thumbnail"> 
          <img src="/static/admins/images/faces/face3.jpg" alt="image" class="profile-pic" /> 
         </div> 
         <div class="preview-item-content d-flex align-items-start flex-column justify-content-center"> 
          <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6> 
          <p class="text-gray mb-0"> 18 Minutes ago </p> 
         </div> </a> 
        <div class="dropdown-divider"></div> 
        <h6 class="p-3 mb-0 text-center">4 new messages</h6> 
       </div> </li> 
      <li class="nav-item dropdown"> <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown"> <i class="mdi mdi-bell-outline"></i> <span class="count-symbol bg-danger"></span> </a> 
       <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown"> 
        <h6 class="p-3 mb-0">Notifications</h6> 
        <div class="dropdown-divider"></div> 
        <a class="dropdown-item preview-item"> 
         <div class="preview-thumbnail"> 
          <div class="preview-icon bg-success"> 
           <i class="mdi mdi-calendar"></i> 
          </div> 
         </div> 
         <div class="preview-item-content d-flex align-items-start flex-column justify-content-center"> 
          <h6 class="preview-subject font-weight-normal mb-1">Event today</h6> 
          <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p> 
         </div> </a> 
        <div class="dropdown-divider"></div> 
        <a class="dropdown-item preview-item"> 
         <div class="preview-thumbnail"> 
          <div class="preview-icon bg-warning"> 
           <i class="mdi mdi-settings"></i> 
          </div> 
         </div> 
         <div class="preview-item-content d-flex align-items-start flex-column justify-content-center"> 
          <h6 class="preview-subject font-weight-normal mb-1">Settings</h6> 
          <p class="text-gray ellipsis mb-0"> Update dashboard </p> 
         </div> </a> 
        <div class="dropdown-divider"></div> 
        <a class="dropdown-item preview-item"> 
         <div class="preview-thumbnail"> 
          <div class="preview-icon bg-info"> 
           <i class="mdi mdi-link-variant"></i> 
          </div> 
         </div> 
         <div class="preview-item-content d-flex align-items-start flex-column justify-content-center"> 
          <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6> 
          <p class="text-gray ellipsis mb-0"> New admin wow! </p> 
         </div> </a> 
        <div class="dropdown-divider"></div> 
        <h6 class="p-3 mb-0 text-center">See all notifications</h6> 
       </div> </li> 
      <li class="nav-item nav-logout d-none d-lg-block"> <a class="nav-link" href="#"> <i class="mdi mdi-power"></i> </a> </li> 
      <li class="nav-item nav-settings d-none d-lg-block"> <a class="nav-link" href="#"> <i class="mdi mdi-format-line-spacing"></i> </a> </li> 
     </ul> 
     <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas"> <span class="mdi mdi-menu"></span> </button> 
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
         <span class="font-weight-bold mb-2">David Grey. H</span> 
         <span class="text-secondary text-small">Project Manager</span> 
        </div> <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> </a> </li> 
      <li class="nav-item"> <a class="nav-link" href="index.html"> <span class="menu-title">后台首页</span> <i class="mdi mdi-home menu-icon"></i> </a> </li> 
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic"> <span class="menu-title">用户管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-account menu-icon"></i> </a> 
       <div class="collapse" id="ui-basic"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="/adminuser">用户列表</a></li>
         <li class="nav-item"> <a class="nav-link" href="/adminuser/create">用户添加</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" href="#gly" aria-expanded="false" aria-controls="gly" data-toggle="collapse"> <span class="menu-title">管理员管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-contacts menu-icon"></i> </a> 
       <div class="collapse" id="gly"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="/administrator">管理员列表</a></li> 
         <li class="nav-item"> <a class="nav-link" href="/administrator/create">管理员添加</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" href="#fenlei" aria-expanded="false" aria-controls="fenlei" data-toggle="collapse"> <span class="menu-title">分类管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-format-list-bulleted menu-icon"></i> </a> 
       <div class="collapse" id="fenlei"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="">分类列表</a></li> 
         <li class="nav-item"> <a class="nav-link" href="">分类添加</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" href="#shop" aria-expanded="false" aria-controls="shop" data-toggle="collapse"> <span class="menu-title">商品管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-shopping menu-icon"></i> </a> 
       <div class="collapse" id="shop"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="">商品列表</a></li> 
         <li class="nav-item"> <a class="nav-link" href="">商品添加</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" href="#order" aria-expanded="false" aria-controls="order" data-toggle="collapse"> <span class="menu-title">订单管理</span> <i class="menu-arrow"></i> <i class="mdi mdi mdi-square-inc-cash menu-icon"></i> </a> 
       <div class="collapse" id="order"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="/order">订单列表</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#lunbo" aria-expanded="false" aria-controls="lunbo"> <span class="menu-title">轮播图管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-xaml menu-icon"></i> </a> 
       <div class="collapse" id="lunbo"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">轮播图列表</a></li> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html">轮播图添加</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#quanxian" aria-expanded="false" aria-controls="quanxian"> <span class="menu-title">管理员权限管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-account-network menu-icon"></i> </a> 
       <div class="collapse" id="quanxian"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">管理员权限列表</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#guanggao" aria-expanded="false" aria-controls="guanggao"> <span class="menu-title">广告管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-lumx menu-icon"></i> </a> 
       <div class="collapse" id="guanggao"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">广告列表</a></li> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">广告添加</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#company" aria-expanded="false" aria-controls="company"> <span class="menu-title">公司管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-polymer menu-icon"></i> </a> 
       <div class="collapse" id="company"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">公司信息</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#friendship" aria-expanded="false" aria-controls="friendship"> <span class="menu-title">友情链接管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-medical-bag menu-icon"></i> </a> 
       <div class="collapse" id="friendship"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">友情链接列表</a></li> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">友情链接添加</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#comment" aria-expanded="false" aria-controls="comment"> <span class="menu-title">评论管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-new-box menu-icon"></i> </a> 
       <div class="collapse" id="comment"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">评论列表</a></li> 
        </ul> 
       </div> </li> 
      <li class="nav-item"> <a class="nav-link" data-toggle="collapse" href="#notice" aria-expanded="false" aria-controls="notice"> <span class="menu-title">公告管理</span> <i class="menu-arrow"></i> <i class="mdi mdi-vector-point menu-icon"></i> </a> 
       <div class="collapse" id="notice"> 
        <ul class="nav flex-column sub-menu"> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">公告列表</a></li> 
         <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html">公告添加</a></li> 
        </ul> 
       </div> </li> 
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
      <a href="javascript:void(0)" class="d-flex align-items-center  btn btn-gradient-danger btn-fw" id="success">
        {{session('success')}}
     
      </a>
      @endif
      @if(session('error'))
      <div class="mws-form-message error">
          {{session('error')}}
      </div>
      @endif
      @section('admin')
     
      @show
     <!-- content-wrapper ends --> 
     <!-- partial:partials/_footer.html -->
      </div>
     <footer class="footer"> 
      <div class="d-sm-flex justify-content-center justify-content-sm-between"> 
       <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright &copy; 2017 <a href="" target="_blank">BootstrapDash</a>. All rights reserved. </span> 
       <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &amp; made with <i class="mdi mdi-heart text-danger"></i> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></span> 
      </div> 
     </footer> 
     <!-- partial --> 
     
    <!-- main-panel ends --> 
   </div> 
   <!-- page-body-wrapper ends --> 
  </div> 
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
  <!-- End custom js for this page-->
  <!--校验类点击消失的js-->
  <script src="/static/admins/js/core/mws.js"></script>
    
 </body>
</html>