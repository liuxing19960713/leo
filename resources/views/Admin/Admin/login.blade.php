<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>灯饰人生后台登录</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/static/admins/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/static/admins/vendors/css/vendor.bundle.base.css">

<!-- jq引入-->
 <script src="/static/admins/js/jquery-mini.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/static/admins/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/static/admins/images/favicon.png" />

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="/static/admins/images/logo.svg">
              </div>
              <h4>Hello!欢迎来到后台</h4>
              <h6 class="font-weight-light">请先登录在继续~</h6>
              <form class="pt-3" action="/adminlogin" method="post">
                 @if(count($errors)>0)

                  <div class="mws-form-message warning">
                    <div class="alert alert-danger">
                      <ul style="list-style-type: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                    </div>
                @endif

                @if(session('error'))

                 <a href="javascript:void(0)" class="mws-form-message error btn btn-gradient-danger btn-fw" id="error">
                      {{session('error')}}
                  </a>
                @endif
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="账号" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="密码" name="pwd">
                </div>

                 <div class="form-group">
                  <input type="text" class="form-control form-control-lg {{$errors->has('captcha')?'parsley-error':''}}" id="exampleInputPassword2" placeholder="验证码" name="captcha">
                </div>
                <div class="form-group">
                    <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
                </div>

                {{csrf_field()}}
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" value="登录">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/static/admins/vendors/js/vendor.bundle.base.js"></script>
  <script src="/static/admins/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/static/admins/js/off-canvas.js"></script>
  <script src="/static/admins/js/misc.js"></script>
  <script src="/static/admins/js/core/mws.js"></script>

  <!-- endinject -->
</body>
<script type="text/javascript">
    $("#success").click(function(){
      $("#success").remove();
    });
    $("#error").click(function(){
      $("#error").remove();
    });

  </script>
</html>
