@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-12 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">添加轮播图</h4>
     <p class="card-description"></p>
     <form class="forms-sample" method="post" action="/wheel" enctype="multipart/form-data">
      <div class="form-group">
       <label for="exampleInputName1">图片名称</label>
       <input type="text" class="form-control" id="exampleInputName1" name="l_name" />
      </div>
       <div class="form-group">
       <label>状态</label>
       <div class="input-group col-xs-12">
        <select class="form-control" id="exampleFormControlSelect2" name="status">
              <option selected="selected" value=""></option>
              <option value="0">禁用</option>
              <option value="1">启用</option>
        </select>
       </div>
      </div>
      <div class="form-group">
       <label>图片&nbsp;&nbsp;&nbsp;&nbsp;(请上传JPG或者JPEG的图片,不超过10M大小的图片)</label>
       <div class="input-group col-xs-12">
        <input type="file" class="form-control file-upload-info" name="pic[]" multiple/>
       </div>
       {{csrf_field()}}

      </div>
      <button type="submit" class="btn btn-gradient-primary mr-2">上传</button>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>
@endsection
@section('title','轮播图添加页面')
