@extends('Admin.AdminPublic.publics')
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-lg-18 grid-margin stretch-card">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">轮播图管理</h4>
     <p class="card-description">  <code>列表</code> <!-- 搜索开始 -->
         <form action="/wheel" method="get">
       <div class="form-group">
          <div class="input-group">
            <input type="text" placeholder="请输入图片名称" class="form-control" aria-describedby="basic-addon2" name="keywords" value="{{$request['keywords'] or ''}}"/>
            <div class="input-group-append">
              <button class="btn btn-sm btn-gradient-primary" type="submit">搜索</button>
            </div>
         </form>
          </div>
      </div>
     </p>
     <table class="table table-hover">
      <thead>
       <tr>
        <th>编号</th>
        <th>图片名</th>
        <th>图片</th>
        <th>状态</th>
        <th style="width: 120px;">添加时间</th>
        <th style="width: 120px;">修改时间</th>
        <th>操作</th>
       </tr>
      </thead>
      <tbody class="croom">

    @foreach($data as $row)

       <tr>
        <td>{{$row->id}}</td>
        <td>{{$row->l_name}}</td>
        <td><img style="display: inline-block;height: 130px;
  width: 200px;border-radius: 0;" src="{{$row->l_pic}}" alt=""></td>
        <td><label

          @if($row->status=='禁用')
            class=" badge badge-danger sta"
          @else
            class="badge badge-success sta"
          @endif
          >
          {{$row->status}}</label></td>
        <td style="width: 120px;">{{$row->created_at}}</td>

        <td style="width: 120px;">{{$row->updated_at}}</td>
        <td>
          <a href="/wheel/{{$row->id}}/edit" class="btn btn-sm btn-gradient-info">修改</a>
          <!-- 普通删除 -->
          <form action="/wheel/{{$row->id}}" method="post">
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
  //当tbody里面没有tr的时候 插入一个tr
// 寻找tbody对象
  // alert($('.croom').find('tr'));
 // 当没有数据的时候插入tr
 room = ($('.croom').find('tr').html());
 // alert(room);
 if(room == undefined){
  // alert(1);
  $('.croom').append('<tr><td colspan="5" style="text-align:center">暂无数据</td></tr>');
 }

   $('.sta').on('click',function(){
    // alert(123);
    // 获取当前id
    id = $(this).parents('tr').find('td:first').text();
    // alert(id);
    // // 获取当前对象
    s = $(this).parents('tr').find('td:nth-child(4)').find('label');
    // // 获取当前状态
    sta = $(this).parents('tr').find('td:nth-child(4)').find('label').html();
    // alert(sta);
     $.ajax({
      url: '/wheelsta',
      data: {id:id,sta:sta},
      success:function(data){
      data = data.replace(/\s/g, '');
        var obj = JSON.parse(data);
   //    // alert(data.msg);
   //    // alert(data.sta);
      if (obj.msg == 1) {
        alert('状态修改成功!');
        if (obj.sta == '启用') {
          s.attr('class','badge badge-success sta').html(obj.sta);
        }else{
           s.attr('class','badge badge-danger sta').html(obj.sta);
        }
      }else{
        alert('状态修改失败!');
      }
    }
    });
   });
 </script>
</html>
@endsection
@section('title','轮播图管理页面')
