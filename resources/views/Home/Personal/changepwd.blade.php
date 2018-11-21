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
          <form action="/editpwd" method="post">

            <div class="login-form">
              <h4 class="login-title">重置密码第一步</h4>

              <div class="row">
                <div class="col-md-8 col-10 mb-20">
                  <label>输入绑定的手机号码</label>&nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="mb-0" type="telephone" placeholder="输入你绑定的手机号"  pattern="^(0|86|17951)?(13[0-9]|15[012356789]|17[0678]|18[0-9]|14[57])[0-9]{8}" value="{{old('phone')}}" name="phone" required="required"/>
                  <span></span>
                </div>
                <div class="col-5 mb-20">
                  <label>验证码</label>
                  <input class="mb-0" type="text" placeholder="验证码" required="required" name="exm" />
                </div>
                <div class="col-5" style="padding-top: 30px;">
                  <button class="register-button mt-0 send" type="button">发送</button>
                </div>

        <input type="hidden" name="uid" value="{{$info->id}}">

            {{csrf_field()}}
                <div class="col-md-12">
                  <button class="register-button mt-0" type="submit"> 下一步</button>
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
      $('.send').on('click',function(){
        // alert($);
        // 获取当前button标签的对象
        $button = $(this);
        $num = ($('input[name="phone"]').val());
        // 找到当前input框的对象
        $inp = $('input[name="phone"]');
        // id
        id = {!!$info->id!!};
        $unum = {!!$info->uname!!};
        $sec = 60;
        if ($num == $unum ) {
          // alert('ok!');
          $inp.next().html('');
          $inp.css('border','');
          // 发送数据过去
          $.ajax({
            url:'/exem',
            data:{id:id,num:$num},
            // dataType:'json',
            success: function(data){
              // console.log(typeof data);
              // console.log(data);
              alert('发送成功!');
               time = setInterval(function(){
                $sec--;
                $button.attr('disabled',true);
                $button.html($sec+'秒后可以重新发送');
            if ($sec == 0) {

                clearInterval(time);

                $button.attr('disabled',false);

                $button.html('重新发送');
                }
              },1000)
            },
             error: function(res){
              // console.log(typeof data);

            }
        });

        }else{
          // 改变样式
          // alert('error!');
          $inp.next().html('请输入您注册的手机号码!').css('color','red');
          $inp.css('border','1px solid red');
        }
      });
  </script>
 </body>
</html>
@endsection
@section('title','灯饰人生')
