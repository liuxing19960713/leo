@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <body>
  <div class="page-section mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30"> 
      <!-- Login Form s--> 
      <form action="#"> 
       <div class="login-form"> 
        <h4 class="login-title " style="float: left;">登陆|</h4><h4 class="login-title regi" >注册</h4> 
        <div class="row"> 
         <div class="col-md-12 col-12 mb-20"> 
          <label>Email Address*</label> 
          <input class="mb-0" type="email" placeholder="Email Address" /> 
         </div> 
         <div class="col-12 mb-20"> 
          <label>Password</label> 
          <input class="mb-0" type="password" placeholder="Password" /> 
         </div> 
         <div class="col-md-8"> 
          <div class="check-box d-inline-block ml-0 ml-md-2 mt-10"> 
           <input type="checkbox" id="remember_me" /> 
           <label for="remember_me">Remember me</label> 
          </div> 
         </div> 
         <div class="col-md-4 mt-10 mb-20 text-left text-md-right"> 
          <a href="#">忘记密码?</a> 
         </div> 
         <div class="col-md-12"> 
          <button class="register-button mt-0">Login</button> 
         </div> 
        </div> 
       </div> 
      </form> 
     </div> 
     
    </div> 
   </div> 
  </div>
  <script>
  	$(".regi").click(function(){
  		// $(window).attr('/hregi',"${pageContext.request.contextPath }/http");
  		$(location).attr('href', '/hregi/create');
  		// alert('aa');
  	})
  </script>
 </body>
</html>

@endsection
@section('title','灯饰人生--登录')