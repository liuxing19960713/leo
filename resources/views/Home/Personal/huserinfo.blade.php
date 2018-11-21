@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <body>
 <html>
 <head></head>
 <body>
  <div class="row" style="margin-left: 250px" > 
    
   <div class="col-sm-10 col-md-12 col-lg-12 col-xs-12" > 
    <form action="/hsaveuser" method="post">
    {{csrf_field()}} 
     <div class="login-form" > 
      <h4 class="login-title">个人中心</h4> 
      <div class="row"> 
       <div class="col-md-10 col-12 mb-20"> 
        <label>姓名：</label> 
        <input class="mb-0" type="text" placeholder="Username" name="username" /> 
       </div> 
       <div class="col-md-10 col-12 mb-20"> 
        <label>年龄：</label> 
        <input class="mb-0" type="text" placeholder="Age" name="age"  /> 
       </div> 
       <div class="col-md-10 mb-20"> 
        <label> 性别：</label> 
	        <select name="sex" id="">
	        	<option value="0">女</option>
	        	<option value="1">男</option>
	        	<option value="2">保密</option>
	        </select>
       </div> 
       <div class="col-md-10 mb-20"> 
        <label>邮箱：</label> 
        <input class="mb-0" type="email" placeholder="email" name="email" /> 
       </div> 
       <div class="col-md-10 mb-20"> 
        <label>电话：</label> 
        <input class="mb-0" type="text" placeholder="Phone" name="phone" /> 
       </div> 

         <div class="col-md-10 mb-20"> 
        <label> 家庭地址：</label> 
        <input class="mb-0" type="text" placeholder="address" name="address" /> 
       </div> 
       <input type="hidden" name="uid" value="{{$id}}">
       <div class="col-12"> 
        <button class="register-button mt-0">保存</button> 
       </div> 
      </div> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
 </body>
</html>
 </body>
</html>

@endsection
@section('title','灯饰人生--个人详情编辑')