@extends('Admin.AdminPublic.publics');
@section('admin')
<html>
 <head></head>
<script src="/static/admins/js/jquery-1.8.3.min.js"></script>
  <style>
    a:link{
    text-decoration:none;
     /* 指正常的未被访问过的链接*/
    }
    a:visited{
        text-decoration:none;
         /*指已经访问过的链接*/
    }a:hover{
         text-decoration:none;
         color: #blue;
         /*指鼠标在链接*/
    }
    a:active{
        text-decoration:none;
        /* 指正在点的链接*/
    }
  </style>
 <body>

 <div class="card">

  <div class="card-body">
   <div class="table-responsive">
   <div class="form-group">

      <form action="/discount" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="请输入与优惠券相关的分类" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" value="{{$request['keyword'] or ''}}">
            <div class="input-group-append">
              <button class="btn btn-sm btn-gradient-primary" type="submit">Search</button>
            </div>
        </div>
      </form>

  </div>
    <h4 class="card-title">优惠券</h4>

    <table class="table">
     <thead>
      <tr align="center">
       <th> 编号 </th>
       <th style="color:red"> 与优惠券<br><b>相关分类</b> </th>
       <th> 状态 </th>
       <th> 满足金额 </th>
       <th> 优惠金额 </th>
       <th> 优惠券名称 </th>
       <th> 描述 </th>
       <th> 开始时间 </th>
       <th> 结束时间 </th>
       <th>操作</th>

      </tr>
     </thead>
     <tbody>
  @foreach($data as $row)
      <tr align="center">
       <td>  {{$row->id}} </td>
       <td class="text-danger">  {{$row->category['name']}} </td>
       <td>
        @if($row->status=='启用')
        <label class="badge badge-gradient-success sta">
            {{$row->status}}
        </label>
        @else
        <label class="badge badge-gradient-danger sta">
            {{$row->status}}
        </label>
        @endif
       </td>
       <td> {{$row->max}}元 </td>
       <td> {{$row->minus}}元 </td>
       <td> {{$row->dname}} </td>
       <td> {{$row->describe}} </td>
       <td> {{$row->start_time}} </td>
       <td> {{$row->end_time}} </td>
       <td>
        <a href="/discount/{{$row->id}}/edit" class="badge badge-gradient-info">修改</a>

        <!-- <a href="javascript:void(0);" class="badge badge-gradient-danger del">删除</a> -->

        <form action="/discount/{{$row->id}}" method="post">
          {{csrf_field()}}
          {{method_field('DELETE')}}
           <button class="badge badge-gradient-danger">删除</button>
        </form>
      </td>
      </tr>
  @endforeach

     </tbody>

    </table>

   </div>

  </div>
 </div>
      <div id="pull_right">
       <div class="pull-right">
              {{$data->appends($request)->render()}}
       </div>
      </div>
    </div>
 </body>
 <script>
  $('.sta').on('click',function(){
    // alert(1);
    // 获取对象
    id = $(this).parents('tr').find('td').first().text();
    // alert(id);
    // 获取状态
    sta = $(this).parents('tr').find('td:nth-child(3)').find('label').html();
    // alert(sta);
    label = $(this).parents('tr').find('td:nth-child(3)').find('label');
    $.get('/discountsta',{id:id,sta:sta},function(data)
    {
        // alert(data.msg);
        if (data.msg == 1) {
          if (data.sta == '启用') {
            label.attr('class','badge badge-gradient-success sta').html(data.sta);
          }else{
            label.attr('class','badge badge-gradient-danger sta').html(data.sta);
          }
          alert('状态修改成功!');
        }
    });
  });

 </script>
</html>

@endsection
@section("title",'灯饰人生--优惠券列表')
