@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修改公司信息</font></font></h4> 
     
    <form class="forms-sample" action="/company/{{$user->id}}" method="post"> 
     <div class="form-group row"> 
      <label for="exampleInputUsername2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公司名</font></font></label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" id="exampleInputUsername2" placeholder="公司名" name="commpany" value="{{$user->commpany}}"/> 
      </div> 
     </div> 
     <div class="form-group row"> 
      <label for="exampleInputEmail2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公司地址</font></font></label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" id="exampleInputEmail2" placeholder="公司地址" name="commpany_address" value="{{$user->commpany_address}}"/> 
      </div> 
     </div> 
     <div class="form-group row"> 
      <label for="exampleInputMobile" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">联系电话</font></font></label> 
      <div class="col-sm-9"> 
       <input type="tel" class="form-control" id="exampleInputMobile" placeholder="联系电话" name="com_tel" value="{{$user->com_tel}}"/> 
      </div> 
     </div> 
     <div class="form-group row"> 
      <label for="exampleInputPassword2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">版权信息</font></font></label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" id="exampleInputPassword2" placeholder="版权信息" name="brank_conten" value="{{$user->brank_conten}}"/> 
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