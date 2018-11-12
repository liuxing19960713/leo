@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">模块添加</h4> 
    <p class="card-description"> Basic form elements </p> 
    <form class="forms-sample" action="/auth" method="post">
    {{csrf_field()}} 
     <div class="form-group"> 
      <label for="exampleInputName1">Model</label> 
      <input type="text" class="form-control" id="exampleInputName1" placeholder="模块名" name="model" /> 
     </div> 
     <div class="form-group"> 
      <label for="exampleInputEmail3">Controller</label> 
      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="控制名" name="controller" /> 
     </div> 
     <div class="form-group"> 
      <label for="exampleInputPassword4">Action</label> 
      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="方法名" name="action" /> 
     </div> 
     
      
    
     <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button> 
     <button class="btn btn-light">Cancel</button> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生--模块的添加')
