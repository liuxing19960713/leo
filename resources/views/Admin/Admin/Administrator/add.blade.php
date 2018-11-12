@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="card-body"> 
   <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理员添加</font></font></h4> 
   
   <form class="forms-sample" action="/administrator" method="post"> 
    <div class="form-group"> 
     <label for="exampleInputName1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户名</font></font></label> 
     <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="{{old('name')}}"/> 
    </div> 
    <div class="form-group"> 
     <label for="exampleInputEmail3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">权限</font></font></label> 
      <tr>
     <td><select class="form-control" id="exampleInputEmail3" placeholder="level" name="level" value="v1"/>
     <option>v1</option>
     <option>v2</option>
     <option>v3</option>
     <option>v4</option>
     </select>
     </td>
     </tr>
    </div> 
    <div class="form-group"> 
     <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">密码</font></font></label> 
     <input type="password" class="form-control" id="exampleInputPassword4" placeholder="password" name="pwd"/> 
    </div> 
    <div class="form-group"> 
     <label for="exampleInputPassword4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">确认密码</font></font></label> 
     <input type="password" class="form-control" id="exampleInputPassword4" placeholder="repassword" name="repassword"/> 
    </div>
     
     
    
    {{csrf_field()}}
    <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">提交</font></font></button> 
    <button class="btn btn-light"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">取消</font></font></button> 
   </form> 
  </div>
 </body>
</html>
@endsection
@section('title','管理员添加')