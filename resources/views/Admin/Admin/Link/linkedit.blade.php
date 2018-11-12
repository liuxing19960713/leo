@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-md-15 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">链接修改</h4>
     <p class="card-description">  </p>
     <form class="forms-sample" method="post" action="/link/{{$info->id}}">
      <div class="form-group row">
       <label for="exampleInputUsername2" class="col-sm-3 col-form-label">链接名字</label>
       <div class="col-sm-7">
        <input type="text" class="form-control" id="exampleInputUsername2" name="urlname" value="{{$info->urlname or ''}}"  />
       </div>
      </div>
      <div class="form-group row">
       <label for="exampleInputEmail2" class="col-sm-3 col-form-label">链接</label>
       <div class="col-sm-7">
        <input type="url" class="form-control" id="exampleInputEmail2" name="link_url" value="{{$info->link_url or ''}}" />
       </div>
      </div>
      <div class="form-group row">
       <label for="exampleInputMobile" class="col-sm-3 col-form-label">状态</label>
       <div class="col-sm-7">
        <select class="form-control" id="exampleFormControlSelect2" name="status">
              <option value="0" {{$info->status=='禁用'?'selected':''}}>禁用</option>
              <option value="1" {{$info->status=='启用'?'selected':''}}>启用</option>
        </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="exampleInputPassword2" class="col-sm-3 col-form-label">修改者</label>
       <div class="col-sm-7">
        <input type="text" class="form-control" id="exampleInputPassword2"  value="{{session('name')}}" placeholder="{{session('name')}}" readonly="readonly" name="admin_id" />
       </div>
      </div>
      {{csrf_field()}}
      {{method_field('PUT')}}
      <div class="form-check form-check-flat form-check-primary">

      </div>
      <button type="submit" class="btn btn-gradient-primary mr-2">提交</button>
      <button  type="reset" class="btn btn-light">重置</button>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>
@endsection
@section('title','友情链接修改页面')
