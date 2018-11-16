@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" charset="utf-8" src="/static/admins/ueditor/ueditor.config.js"></script>
 <script type="text/javascript" charset="utf-8" src="/static/admins/ueditor/ueditor.all.min.js"></script>
 <script type="text/javascript" charset="utf-8" src="/static/admins/ueditor/lang/zh-cn/zh-cn.js"></script>
 <body>
  <div class="col-md-15 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">文章修改</h4>
     <p class="card-description">  </p>
     <form class="forms-sample" method="post" action="/article/{{$info->id}}">
      <div class="form-group row">
       <label for="exampleInputUsername2" class="col-sm-3 col-form-label">文章标题</label>

        <input type="text" class="form-control" id="exampleInputUsername2" name="title" value="{{$info->title or ''}}" />
       
      </div>
      <div class="form-group row">
       <label for="exampleInputUsername2" class="col-sm-3 col-form-label">文章前言</label>

        <input type="text" class="form-control" id="exampleInputUsername2" name="title" value="{{$info->head or ''}}" />
       
      </div>
      <div class="form-group row">
       <label for="exampleInputEmail2" class="col-sm-3 col-form-label">文章内容</label>
       
       <script id="editor" type="text/plain" style="width:1024px;height:500px;" name="content">{!!$info->content!!}</script>

       
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
       <label for="exampleInputPassword2" class="col-sm-3 col-form-label">添加者</label>
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
<script type="text/javascript">
  //实例化编辑器
  var ue = UE.getEditor('editor');
</script>
</html>
@endsection
@section('title','友情链接添加页面')
