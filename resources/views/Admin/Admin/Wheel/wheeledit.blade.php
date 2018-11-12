@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-12 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">修改轮播图</h4>
     <p class="card-description"></p>
     <form class="forms-sample" method="post" action="/wheel/{{$data->id}}" enctype="multipart/form-data">
      <div class="form-group">
       <label for="exampleInputName1">图片名称</label>
       <input type="text" class="form-control" id="exampleInputName1" name="l_name" value="{{$data->l_name or ''}}" />
      </div>
      <div class="form-group">
       <label>状态</label>
       <div class="input-group col-xs-12">
        <select class="form-control" id="exampleFormControlSelect2" name="status">
              <option value="0" {{$data->status == '禁用'?'selected':''}} >禁用</option>
              <option value="1" {{$data->status == '启用'?'selected':''}} >启用</option>
        </select>
       </div>
      </div>
<!-- 遍历图片 -->
      <div class="form-group">
        <label>原先图片</label>
        <br>
          <img style="display: inline-block;height: 130px;
  width: 200px;border-radius: 0;" src="{{substr($data->l_pic,1)}}" alt="出错啦">
      </div>
<!-- 图片结束 -->
      <div class="form-group">
       <label>新图片图片&nbsp;&nbsp;&nbsp;&nbsp;(请上传JPG或者JPEG的图片,不超过10M大小的图片)</label>
       <div class="input-group col-xs-12">
        <input type="file" class="form-control file-upload-info" name="pic[]" multiple/>
       </div>
      {{csrf_field()}}
      {{method_field('PUT')}}
      </div>
      <button type="submit" class="btn btn-gradient-primary mr-2">修改</button>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>
@endsection
@section('title','轮播图修改页面')
