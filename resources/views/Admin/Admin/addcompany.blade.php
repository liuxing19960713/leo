@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加公司</font></font></h4> 
     
    <form class="forms-sample" action="/company" method="post"> 
     <div class="form-group row"> 
      <label for="exampleInputUsername2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公司名</font></font></label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" id="exampleInputUsername2" placeholder="公司名" name="commpany" value="{{old('commpany')}}"/> 
      </div> 
     </div> 
     <div class="form-group row"> 
      <label for="exampleInputEmail2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公司地址</font></font></label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" id="exampleInputEmail2" placeholder="公司地址" name="commpany_address" value="{{old('commpany_address')}}"/> 
      </div> 
     </div> 
     <div class="form-group row"> 
      <label for="exampleInputMobile" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">联系电话</font></font></label> 
      <div class="col-sm-9"> 
       <input type="tel" class="form-control" id="exampleInputMobile" placeholder="联系电话" name="com_tel" value="{{old('com_tel')}}"/> 
      </div> 
     </div> 
     <div class="form-group row"> 
      <label for="exampleInputPassword2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">版权信息</font></font></label> 
      <div class="col-sm-9"> 
       <input type="text" class="form-control" id="exampleInputPassword2" placeholder="版权信息" name="brank_conten" value="{{old('brank_conten')}}"/> 
      </div> 
     </div>
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加</font></font></button> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生--后台管理系统')