@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head>
 </head>
 <body>
  <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <div class="breadcrumb-container">
       <ul>
        <li><a href="/mypersonal">个人首页</a> <span class="separator">/</span></li>
        <li class="active">修改密码</li>
       </ul>
      </div>
     </div>
    </div>
   </div>
  </div>
     <div class="page-section mb-80">
    <div class="container">
      <div class="row">
        <div class="col-sm-20 col-md-12 col-xs-12 col-lg-20 mb-30">
          <!-- Login Form s-->
          <form action="/upwd" method="post">

            <div class="login-form">
              <h4 class="login-title">重置密码第二步</h4>

              <div class="row">

               <div class="col-md-8 col-10 mb-20">
                  <label>输入新的密码</label>&nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="mb-0"  id="newpwd1" type="password" placeholder="输入新的密码"  name="newpwd" required="required" onblur="checkpas1();"/>
                  <span></span>
                </div>
              <div class="col-md-8 col-10 mb-20" >
                  <label>再次输入新的密码</label>&nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="mb-0" type="password" placeholder="再次输入新的密码" id="renewpwd1" name="renewpwd" required="required" onChange="checkpas();"/>
                  <span class="tip" style="color: red;">两次输入的密码不一致</span>
                </div>



            {{csrf_field()}}

                <div class="col-md-12">
                  <button class="register-button mt-0" type="submit" onclick="checkpas2();"> 提交</button>
                  <button class="register-button mt-0"  style="margin-left: 20px;" type="reset">重置</button>
                </div>

              </div>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>
  <script>
 $(".tip").hide();
function checkpas1(){//当第一个密码框失去焦点时，触发checkpas1事件
  // alert(1);
      var pas1=$("#newpwd1").val();
      // console.log(pas1);
      var pas2=$("#renewpwd1").val();//获取两个密码框的值
      // console.log(pas2);

if( pas1!=pas2 && pas2=="")//此事件当两个密码不相等且第二个密码是空的时候会显示错误信息
  $(".tip").show();
else
  $(".tip").hide();//若两次输入的密码相等且都不为空时，不显示错误信息。

}
function checkpas(){//当第一个密码框失去焦点时，触发checkpas件
var pas1=$("#newpwd1").val();
var pas2=$("#renewpwd1").val();//获取两个密码框的值
if(pas1!=pas2){
$(".tip").show();//当两个密码不相等时则显示错误信息
}else{
$(".tip").hide();
}
}
      function checkpas2(){//点击提交按钮时，触发checkpas2事件，会进行弹框提醒以防无视错误信息提交
        var pas3=$("#newpwd1").val();
        var pas4=$("#renewpwd1").val();
        if(pas3!=pas4){
          alert("两次输入的密码不一致！");
          return false;
        }
      }
  </script>
 </body>
</html>
@endsection
@section('title','灯饰人生')
