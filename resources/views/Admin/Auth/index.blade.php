@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title">功能模块</h4> 
    <div class="table-responsive"> 
     <table class="table"> 
      <thead> 
       <tr> 
        <th> id </th> 
        <th> 模块名 </th> 
        <th> 控制器 </th> 
        <th> 方法 </th> 
       </tr> 
      </thead> 
      <tbody> 
      	@foreach($info as $r)
       <tr> 
        <td> {{$r->id}} </td> 
        <td> {{$r->model}} </td> 
        <td> {{$r->controller}} </td> 
        <td> 
        	{{$r->action}} 
        </td> 
       </tr>
       @endforeach 
        
         <div class="progress"> 
          <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div> 
         </div> </td> 
       </tr> 
      </tbody> 
     </table> 
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生--模块列表')