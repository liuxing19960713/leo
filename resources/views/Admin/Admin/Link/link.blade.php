@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-lg-20 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">友情链接管理</h4>
     <p class="card-description">
    <!-- 搜索开始 -->
         <form action="/link" method="get">
       <div class="form-group">
          <div class="input-group">
            <input type="text" placeholder="请输入链接名称" class="form-control" aria-describedby="basic-addon2" name="keywords" value="{{$request['keywords'] or ''}}"/>
            <div class="input-group-append">
              <button class="btn btn-sm btn-gradient-primary" type="submit">搜索</button>
            </div>
         </form>
          </div>
      </div>
     </p>
    <!-- 搜索结束 -->

     <table class="table table-hover">
      <thead>
       <tr>
        <th>编号</th>
        <th>链接名称</th>
        <th style="width: 180px;">链接路径</th>
        <th>添加者</th>
        <th>状态</th>
        <th style="width: 120px;">更新时间</th>
        <th style="width: 120px;">创建时间</th>
        <th>操作</th>
       </tr>
      </thead>
      <tbody class="croom">
        @foreach($data as $row)

       <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->urlname}}</td>
        <td class="text-danger" style="width: 180px;font-size: 12px;">{{$row->link_url}}</td>
        <!-- 关联起来直接调用 多对一 其实就是反向关联 belongsTo -->
        <td>{{$row->admin['name']}}</td>
        <td class=" status btn btn-gradient-dark" style="margin-top: 20px;">{{$row->status}}</td>
        <td style="width: 120px;">{{$row->updated_at}}</td>
        <td style="width: 120px;">{{$row->created_at}}</td>
        <td><a href="/link/{{$row->id}}/edit" class="btn btn-sm btn-gradient-info">修改</a>
          <!-- 普通删除 -->
          <form action="/link/{{$row->id}}" method="post">
            {{csrf_field()}}
          {{method_field("DELETE")}}
          <button class="btn btn-sm btn-gradient-danger" type="submit" onclick="return confirm('你确定要删除吗?')">删除</button>
          </form>
          <!-- 普通删除结束 -->
        </td>
       </tr>

       @endforeach
      </tbody>
     </table>
      <!-- 分页 -->
      <div id="pull_right">
       <div class="pull-right">
          {{$data->appends($request)->render()}}
       </div>
      </div>
      <!-- 分页结束 -->
    </div>
   </div>
  </div>
 </body>
 <script>
  // 当没有数据的时候插入tr
 room = ($('.croom').find('tr').html());
 // alert(room);
 if(room == undefined){
  // alert(1);
  $('.croom').append('<tr><td colspan="5" style="text-align:center">暂无数据</td></tr>');
 }
  // alert($);
  $('.status').click(function(){
    // alert('hah ');
    //获取该链接的id
    id = $(this).parents('tr').find('td:first').html();
    // alert(id);
    //存储 该状态的td 的对象
    s = $(this).parents('tr').find('td:nth-child(5)');
    //获取状态
    //
    sta = $(this).parents('tr').find('td:nth-child(5)').html();
    // alert(sta);
    //ajax
    $.get('/linkss',{id:id,sta:sta},function(data){
      // alert(data);
      if (data.msg == 1) {
        alert('修改成功');
        // alert(data.sta);
        s.html(data.sta);
      }else{
        alert('修改失败！');
      }
    },'json');
  });
 </script>
</html>
@endsection
@section('title','友情链接管理页面')
