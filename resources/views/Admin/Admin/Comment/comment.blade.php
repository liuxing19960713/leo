@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-lg-20 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">评论管理</h4>
     <p class="card-description">
    <!-- 搜索开始 -->
         <form action="/comment" method="get">
       <div class="form-group">
          <div class="input-group">
            <input type="text" placeholder="请输入商品名称" class="form-control" aria-describedby="basic-addon2" name="keywords" value="{{$request['keywords'] or ''}}"/>
            <input type="text" placeholder="请输入评论用户名" class="form-control" aria-describedby="basic-addon2" name="keywordss" value="{{$request['keywordss'] or ''}}"/>
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
        <th style="width: 180px;">商品名称</th>
        <th style="width: 180px;">评论内容</th>
        <th>评论用户</th>
        <th>评分(1-5分 0默认好评)</th>
        <th>评论时间</th>
        <th>操作</th>
       </tr>
      </thead>
      <tbody class="croom">
     @foreach($data as $row)
       <tr style="height: 90px;">
        <td>{{$row->id}}</td>
        <td>{{$row->goods_name}}</td>
        <td class="text-danger" style="width: 180px;font-size: 12px;overflow: hidden;">
 @php
 echo htmlspecialchars_decode($row->comment) @endphp
          </td>
        <!-- 关联起来直接调用 多对一 其实就是反向关联 belongsTo -->
        <td>{{$row->uname}}</td>
        <td class="status">{{$row->score}}</td>
        <td style="width: 120px;">{{date('Y-m-d H:i:s',$row->addtime)}}</td>

        <td>
          @if($row->re_status==0)
          <a href="/recommentinsert/{{$row->id}}" class="btn btn-sm btn-gradient-info">回复</a>
          @else
          <button class="btn btn-sm btn-gradient-info" disabled >已回复</button>
          @endif
          <!-- 普通删除 -->
          <!-- <form action="/comment/{{$row->id}}" method="post"> -->
            <!-- <div class="form-group"> -->
              <!-- <div class="input-group"> -->
            {{csrf_field()}}
          {{method_field("DELETE")}}
          <!-- <button class="btn btn-sm btn-gradient-danger" type="submit" onclick="return confirm('你确定要删除吗?')">删除</button> -->

          <!-- </form> -->
          <!-- 普通删除结束 -->
          <!-- ajax 删除 -->
          <a href="javascript:void(0)" class="btn btn-sm btn-gradient-primary del" onclick="return confirm('你确定要删除吗!?')">Ajax删除</a>
             </div>
        </div>
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
 $('.del').click(function(){
    // alert(1);
    // 获取id
    id = $(this).parents('tr').find('td:first').text();
    // alert(id);
    //获取该tr的对象
    tr = $(this).parents('tr');

    //ajax
    $.get('/commentdel',{id:id},function(data){
      // alert(data);
      if (data.msg == 1) {
        tr.remove();
        alert('删除成功!');
      }else{
        alert('删除失败!');
      }
    });
 });

 </script>
</html>
@endsection
@section('title','评论页面')
