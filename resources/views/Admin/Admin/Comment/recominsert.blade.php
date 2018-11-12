@extends('Admin.AdminPublic.publics')
@section('admin')
<!-- ueditor-mz 配置文件 -->
<script type="text/javascript" src="{{asset('UEditor/ueditor.config.js')}}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{asset('UEditor/ueditor.all.js')}}"></script>
 <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
  <!--   <script type="text/javascript" charset="utf-8" src="{{asset('UEditor/ueditor.all.js')}}"></script> -->
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('ue-container',{
    toolbars: [
  [     'anchor', //锚点
        'redo', //重做
        'bold', //加粗
        'indent', //首行缩进
        'italic', //斜体 'undo', 'redo', 'bold'
        'forecolor', //字体颜色
        'emotion', //表情
  ],
  [
        'fontborder', //字符边框
        'formatmatch', //格式刷
        'pasteplain', //纯文本粘贴模式
        'selectall', //全选
        'print', //打印
        'removeformat', //清除格式
        'unlink', //取消链接
        'cleardoc', //清空文档
        'fontfamily', //字体
        'fontsize', //字号
      ],
    ]
    });
    ue.ready(function(){
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
</script>

<html>
 <head></head>
 <body>
  <div class="col-12 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">回复</h4>
     <form class="forms-sample" action="/recommentinsert/{{$commid}}" method="post">


      <div class="form-group">
       <label for="exampleInputCity1">评论者</label>
       <input type="text" class="form-control" id="exampleInputCity1" value="{{$name}}" disabled="disabled" />
      </div>
      <div class="form-group">
       <label for="exampleInputCity1">评论的商品名</label>
       <input type="text" class="form-control" id="exampleInputCity1" value="{{$goodsname}}" disabled="disabled" />
      </div>
      <div class="form-group">
       <label for="exampleInputCity1">评论的内容</label>
        <br>
      <td class="text-danger" style="width: 180px;font-size: 12px;overflow: hidden;color: red;">
 @php
 echo htmlspecialchars_decode($comment) @endphp
          </td>
      </div>
      {{ csrf_field() }}
      <div class="form-group">
       <label for="exampleT extarea1">Textarea</label>
       <!-- 加载编辑器的容器 -->
      <script id="ue-container" name="recomment"  type="text/plain">
      </script>
      </div>
      <button type="submit" class="btn btn-gradient-primary mr-2">提交</button>
      <a class="btn btn-light" href="/comment">返回</a>
     </form>
    </div>
   </div>
  </div>
 </body>
</html>
@endsection
@section('title','回复评论页面')
