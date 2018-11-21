@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" charset="utf-8" src="/UEditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/UEditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/UEditor/lang/zh-cn/zh-cn.js"></script>
 <body>
  <div class="card"> 
   <div class="card-body"> 
    <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加公告</font></font></h4> 
     
    <form class="forms-sample" action="/notice" method="post"> 
     <div class="form-group row"> 
      <label for="exampleInputUsername2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">标题</font></font></label> 
       
       <input type="text" class="form-control" id="exampleInputUsername2" placeholder="标题" name="title" value="{{old('title')}}"/> 
       
     </div> 
     <div class="form-group row"> 
      <label for="exampleInputEmail2" class="col-sm-3 col-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公告内容</font></font></label> 
      
        <script id="editor" name="content" type="text/plain" style="width:1200px;height:500px;"></script>
       
     </div> 
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加</font></font></button> 
    </form> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
 //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
 </script>
</html>
</html>
@endsection
@section('title','灯饰人生--后台管理系统')