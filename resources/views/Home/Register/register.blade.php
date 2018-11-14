@extends("Home.HomePublic.publics")
@section('home')

<html>
 <head></head>
 <body>
  <div class="page-section mb-80"> 
   <div class="container"> 
    <div class="row"> 
       
     <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12"> 
      <form action="/hregi" method="post">
      {{csrf_field()}} 
       <div class="login-form"> 
        <h4 class="login-title">Register</h4> 
        <div class="row"> 
         
         <div class="col-md-12 mb-20"> 
          <label>用户*</label><span class="n"></span> 
          <input class="mb-0 uname" type="text" name="uname" placeholder="phone" /> 
         </div> 
         <div class="col-md-12 mb-20"> 
          <label>密 码</label> <label class="pwd"></label>
          <input class="mb-0 upwd" type="password" placeholder="Password" name="upwd" /> 
         </div> 
         <div class="col-md-12 mb-20"> 
          <label>确认 密码</label>  <label class="repwd"></label>
          <input class="mb-0 rupwd " type="password" placeholder="Confirm Password" name="rupwd" /> 
         </div>
         <div class="col-md-6 col-12 mb-20"> 
          <label>验证码</label> 
          <input class="mb-0 " type="text" placeholder="填写验证码" name="code" /> 
         </div>  
         <div class="col-md-6 col-12 mb-20" style="padding-top: 30px"> 
             <span  class="register-button mt-0 code sendcode">Send</span>
         </div> 
         <span  class="cc""></span>

         <div class="col-12"> 
          <button class="register-button mt-0">Register</button> 
         </div> 
        </div> 
       </div> 
      </form> 

     </div> 
    </div> 
   </div> 
  </div>
  <script>
    // alert($);
   
    // 验证用户名是否合法
    //光标离开获取uname
    // $('.uname').blur(function(){
    //     //获取用户名的值
    //     var uname = $(".uname").val();
    //     var nn    = $(".n");
       
    //     if(uname == ""){
    //           nn.html("不能为空").css("color","red").css("font-Size","20px");
    //           return false;
    //     }
    //     // alert(uname);
    //     $.get("/checkuname",{uname:uname},function(data)
    //     {

    //         // alert(data);
    //         if (data==0) {
    //           nn.html("可以使用").css("color","red").css("font-Size","20px");
    //         }else if(data == 3){
    //           nn.html("不符合用户规则").css("color","red").css("font-Size","20px");

    //         }else{
    //            nn.html("账号太守欢迎,请重新编写").css("color","red").css("font-Size","20px");
    //         }

    //     },"json");
    // });

    
    var pwd   = $(".pwd");
   $(".upwd").blur(function(){
      // alert('222');
      var upwd = $(".upwd").val();
      // alert(upwd);
        // console.info(thisurl);
        if(upwd == ""){
           pwd.html("密码不能为空");

        }


    });

    $(".rupwd").blur(function(){
      var repwd = $(".repwd");

      // alert('222');
      var upwd = $(".rupwd").val();
      // alert(upwd);
       if(upwd == ""){
           repwd.html("密码不能为空");

        }


    });


     $(".code").blur(function(){
      var cc = $(".cc");

      // alert('222');
      var code = $(".code").val();
      // alert(upwd);
     
        // console.info(thisurl);
        if(code == ""){
            cc.html("验证码不能为空").css("color","red").css("font-Size","20px");
            return false;
        }


    });



    // 获取btn对象
  $(".sendcode").click(function(){
    // alert('11');
    o = $(this);
    var phone = $(".uname").val();
      $.get("/hsend",{phone:phone},function(data){
         newData=data.replace(/\s/g,'');

        // alert(newData[code]);
        // sss = data.match(/"code":"\d{6}"/);
     
      
        dad =  eval('(' +  newData + ')');
          if(dad.code== 000000){
            msg = 60;
            mytime=setInterval(function(){
              msg--;
              //把m值赋值a
              o.html(msg+"秒后重新发送");
              o.attr('disabled',true);
              //判断
              if(msg=='0'){
                //清除定时器
                clearInterval(mytime);
                //重新给a标签赋值
                o.html("重新发送");
                o.attr("disabled",false);

              }
            },1000);
          }
      });
    });
      // alert('aa');
       
        // alert('aaa');
    // $(".sendcode").click(function(){
    //   var phone = $(".uname").val();
    //   send =  $(this);

    //   $.ajax({
    //     url: '/hsend',
    //     data: {phone:phone},
    //     dataType: 'json',
    //     success: function(data){
    //       // newData=data.replace(/\s/g,'');
    //       alert(data.code);
    //     },
    //     error: function(data){
    //       alert(1)
    //     }
    //   })
    // });

    // $.get("./phone.php",{phone:phone},function(data){
    // alert(data.code);
    // if(data.code==000000){
    //   m=5;
    //   //按钮倒计
    //   mytime=setInterval(function(){
    //     m--;
    //     //把m值赋值a
    //     o.html(m+"秒后重新发送");
    //     o.attr('disabled',true);
    //     //判断
    //     if(m==0){
    //       //清除定时器
    //       clearInterval(mytime);
    //       //重新给a标签赋值
    //       o.html("重新发送");
    //       o.attr("disabled",false);

    //     }
    //   },1000);
    // }

  // },'json');
  </script>
 </body>
</html>


@endsection
@section('title','灯饰人生--注册')