@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改广告</font></font></h4> 
     
    <form class="forms-sample" action="/adver/{{$user->id}}" method="post" enctype="multipart/form-data"> 
     <div class="form-group row"> 
      <label for="exampleInputUsername2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告名称</font></font></label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" id="exampleInputUsername2" placeholder="广告名称" name="ad_name" value="{{$user->ad_name}}"/> 
      </div> 
     </div> 
     <div class="form-group row"> 
      <label for="exampleInputEmail2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告标题</font></font></label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" id="exampleInputEmail2" placeholder="广告标题" name="adv_title" value="{{$user->adv_title}}"/> 
      </div> 
     </div> 
     <div class="form-group row">
      <label for="exampleInputEmail2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">原图片</font></font></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <img src="/uploads/{{$user->pic}}" height="300px" >
      </div>
      <div class="form-group row">
      <label for="exampleInputEmail2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">新图片</font></font></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="file" name="pic" value=""  id="exampleInputEmail2" >
      </div> 
     <div class="form-group row"> 
      <label for="exampleInputPassword2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">所属公司</font></font></label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" id="exampleInputPassword2" placeholder="所属公司" name="commpany" value="{{$user->commpany}}"/> 
      </div> 
     </div>
     {{csrf_field()}}
     {{method_field('PUT')}}
     <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改</font></font></button> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生--后台管理系统')