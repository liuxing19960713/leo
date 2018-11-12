@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-md-15 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">链接添加</h4>
     <p class="card-description">  </p>
     <form class="forms-sample" method="post" action="/link">
      <div class="form-group row">
       <label for="exampleInputUsername2" class="col-sm-3 col-form-label">链接名字</label>
       <div class="col-sm-7">
        <input type="text" class="form-control" id="exampleInputUsername2" name="urlname" value="{{old('urlname')}}" />
       </div>
      </div>
      <div class="form-group row">
       <label for="exampleInputEmail2" class="col-sm-3 col-form-label">链接</label>
       <div class="col-sm-7">
        <input type="url" class="form-control" id="exampleInputEmail2" name="link_url" value="{{old('link_url')}}" />
       </div>
      </div>
      <div class="form-group row">
       <label for="exampleInputMobile" class="col-sm-3 col-form-label">状态</label>
       <div class="col-sm-7">
        <select class="form-control" id="exampleFormControlSelect2" name="status">
              <option selected="selected" value=""></option>
              <option value="0">禁用</option>
              <option value="1">启用</option>
        </select>
       </div>
      </div>
      <div class="form-group row">
       <label for="exampleInputPassword2" class="col-sm-3 col-form-label">添加者</label>
       <div class="col-sm-7">
        <input type="text" class="form-control" id="exampleInputPassword2"  value="{{session('name')}}" placeholder="{{session('name')}}" readonly="readonly" name="admin_id" />
       </div>
      </div>
      {{csrf_field()}}
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
@section('title','友情链接添加页面')
