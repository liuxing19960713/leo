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
       
     <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12"> 
      <form action="/hregi" method="post" id="form">
      {{csrf_field()}} 
       <div class="login-form"> 
        <h4 class="login-title">Register</h4> 
        <div class="row"> 
         
         <div class="col-md-12 mb-20"> 
          <label>用户*</label><span class="n"></span> 
          <input class="mb-0 uname"   reminder="手机不能为空"  type="text" name="uname" placeholder="phone" />  <span class="ss"></span>
         </div> 
         <div class="col-md-12 mb-20"> 
          <label>密 码</label> <label class="pwd"></label>
          <input class="mb-0 upwd"  reminder="密码不能为空"  type="password" placeholder="Password" name="upwd" /> 
         </div> 
         <div class="col-md-12 mb-20"> 
          <label>确认 密码</label>  <label class="repwd"></label>
          <input class="mb-0 rupwd " reminder="确认密码不能为空"  type="password" placeholder="Confirm Password" name="rupwd" /> 
         </div>
         <div class="col-md-6 col-12 mb-20"> 
          <label>验证码</label> 
          <input class="mb-0 " reminder="填写验证码不能为空" type="text" placeholder="填写验证码" name="code" /> 
         <span  class="cc"></span>

         </div>  
         <div class="col-md-6 col-12 mb-20" style="padding-top: 30px"> 
             <span  class="register-button mt-0 code sendcode">Send</span>

         </div> 

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
    phone = false;
    password = false;
    // alert($);
  $("input").focus(function(){
      reminder = $(this).attr("reminder");
  $(this).next("span").css('color',"red").html(reminder);
    //样式清除
    $(this).removeClass("curs");
    //添加样式
    $(this).addClass('cur');
  })
     

    
  var pwd   = $(".pwd");
   $(".upwd").blur(function(){
      // alert('222');
      var upwd = $(".upwd").val();
      // alert(upwd);
        // console.info(thisurl);
        if(upwd == ""){
           pwd.html("密码不能为空");
           password =false;
        }else{
          password = true;
        }


    });

    $(".rupwd").blur(function(){
      var repwd = $(".repwd");

      // alert('222');
      var upwd = $(".rupwd").val();
      // alert(upwd);
       if(upwd == ""){
           repwd.html("确认密码不能为空");
        }else{
        }


    });


    



    // 获取btn对象
  $(".sendcode").click(function(){
    // alert('11');
    o = $(this);
    var phone = $(".uname").val();
      $.get("/hsend",{phone:phone},function(data){
         newData=data.replace(/\s/g,'');
      
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


    //验证码
     $("input[name='uname']").blur(function(){
      name = $(this).val();
      console.log(name);
      if(name==""){
        ss = $('.ss');
         ss.css('red','red').html("不能为空");
         ss.addClass("curs");
         // 
         phone = false; 
      }else{
        phone = true;
      }
        uname = $(this).val();
        ss = $(".ss");
        // console.log(vcode);
          $.ajax({
              type:"get",
              url: '/checkuname',
              data: {uname:uname},
              // dataType: 'json',

              success: function(data){
                // newData=data.replace(/\s/g,'');
                // alert(data);
           /*     if(data == 1){
                    ss.css('color','green').html("账号太守欢迎,请重新填写");
                    ss.addClass("curs");
                    phone = false;
                }else if (data == 2){
                    ss.css('color','green').html("不能为空");
                    ss.addClass("curs");
                    phone = false;
                } else {
                    ss.css('color','red').html("账号太守欢迎,请重新填写");
                    ss.addClass("curs");
                    phone = false;  
                }*/
                if(data== 1){
                    ss.css('color','blue').html("可以使用");
                    ss.addClass("curs");
                    phone = true;

                }else{
                   ss.css('color','red').html("账号太守欢迎,请重新填写");
                    ss.addClass("curs");
                    phone = false; 
                }
              },
              error: function(data){
                // alert('系统正在')

              }
          });
      });



   // 表单验证
   $("#form").submit(function(){
      if(password && phone){
        return true;
      }else{
        return false;
      }
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
    //       // 
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