@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <style>
  .cur{
    border:1px solid red;
  }

  .curs{
    border:1px solid green;
  }
 </style>
 <body>
  <div class="page-section mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 mb-30"> 
      <!-- Login Form s--> 
      <form action="/hlogin" method="post" id="form"> 
        {{csrf_field()}}
       <div class="login-form"> 
        <h4 class="login-title " style="float: left;">登陆|</h4><h4 class="login-title regi " >注册</h4> 
        <div class="row"> 
         <div class="col-md-12 col-12 mb-20"> 
          <label>用户名*</label> 
          <input class="mb-0 "  reminder="请输入手机"  type="text" placeholder="phone" name="uname" />
           <span class="input-group-btn ps"></span> 
         </div> 
         <div class="col-12 mb-20"> 
          <label>Password</label> 
          <input class="mb-0  "  reminder="请输入密码" type="password" placeholder="Password"  name="upwd" /> 
           <span class="input-group-btn pwd "></span>
         </div>


          <div class="col-6 mb-20"> 
          <label>验证码</label> 
          <input class="mb-0" type="text"  reminder="请输入验证码"  placeholder="vcode"  name="vcode" /> 
          <span class="input-group-btn ss"></span>
         </div>

         <div class="col-6 mb-20" style="padding-top: 25px"> 
          <img src="/code" onclick="this.src=this.src+'?a=1'">
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
    phone       = false;
    password    = false;
    CODE        = false;
  	$(".regi").click(function(){
  		// $(window).attr('/hregi',"${pageContext.request.contextPath }/http");
  		$(location).attr('href', '/hregi/create');
  		// alert('aa');
  	});


     $("input").focus(function(){
        //获取reminder属性值
          reminder=$(this).attr("reminder");
          $(this).next("span").css('color',"red").html(reminder);
          //样式清除
          $(this).removeClass("curs");
          //添加样式
          $(this).addClass('cur');

    });

     //手机
     $("input[name='uname']").blur(function(){
        
          uname = $(this).val();
          if(uname ==""){
              ps = $(".ps");
              ps.css('color','red').html("手机不能为空");
              phone = false;

          }else{
            phone = true;
          }
     });


     $("input[name='upwd']").blur(function(){
        
          uname = $(this).val();
          if(uname ==""){
              pwd = $(".pwd");
              pwd.css('color','red').html("密码不能为空");
              password = false;

          }else{
            password = true;
          }
     });


     //验证码
     $("input[name='vcode']").blur(function(){
        vcode = $(this).val();
        ss = $(".ss");
        // console.log(vcode);
          $.ajax({
              type:"get",
              url: '/chvcode',
              data: {vcode:vcode},
              // dataType: 'json',

              success: function(data){
                // newData=data.replace(/\s/g,'');
                // alert(data);
                if(data == 1){
                    ss.css('color','green').html("验证码正确");
                    ss.addClass("curs");
                    CODE = true;
                }else if(data == 2){
                    ss.css('color','red').html("验证码不能为空");
                    CODE=false;
                }else{
                    ss.css('color','red').html("验证码错误");
                    CODE=false;
                }
              },
              error: function(data){
                // alert('系统正在')

              }
          });
      });

     $("#form").submit(function(){
        if(phone && password && CODE){
          return true;
        }else{
          return false;

        }
     });

     

  </script>
 </body>
</html>

@endsection
@section('title','灯饰人生--登录')