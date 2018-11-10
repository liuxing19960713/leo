@extends('Admin.AdminPublic.publics');
@section('admin')
<html>
 <head></head>
<script src="/static/admins/js/jquery-1.8.3.min.js"></script>

 <body>
  
 <div class="card">
    
  <div class="card-body"> 
   <div class="table-responsive"> 
   <div class="form-group">
    
      <form action="/agoods" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
            <div class="input-group-append">
              <button class="btn btn-sm btn-gradient-primary" type="button">Search</button>
            </div>
        </div>
      </form>
  
  </div>
    <h4 class="card-title">Recent Tickets</h4> 

    <table class="table"> 
     <thead> 
      <tr align="center"> 
       <th> id </th> 
       <th> 商品名 </th>
       <th> 状态 </th> 
       <th> 分类 </th> 
       <th> 库存 </th> 
       <th> 添加时间 </th> 
       <th> 修改时间 </th> 
       <th>操作</th>

      </tr> 
     </thead> 
     <tbody>
      @foreach($info as $row)
      <tr align="center"> 
       <td>{{$row->gid}}  </td> 
       <td> {{$row->goods_name}} </td> 
       <td>
        <label class="badge badge-gradient-success">
        @if($row->status==1)
          显示
        @else
          隐藏
        @endif
        </label>
       </td> 
       <td> {{$row->name}} </td> 
       <td> {{$row->stock}} </td> 
       <td> {{$row->created_at}}</td> 
       <td> {{$row->updated_at}} </td> 
       <td> 
        <a href="/agoods/{{$row->gid}}" class="badge badge-gradient-success">详情</a>
        <a href="/agoods/{{$row->gid}}/edit" class="badge badge-gradient-info">修改</a> 
        <!-- <a href="javascript:void(0);" class="badge badge-gradient-danger del">删除</a> -->
         
        <form action="/agoods/{{$row->gid}}" method="post">
         {{csrf_field()}}
          {{method_field('DELETE')}}
           <button class="badge badge-gradient-danger">删除</button>
        </form>
      </td>  


      </tr> 
      @endforeach
    
     </tbody>
     
    </table> 
     <div id="pull_right">
       <div class="">
          {{$info->appends($request)->render()}}
       </div>
    </div> 
   </div> 
  </div>
 </div>
 </body>
 <script>
   // alert($); 
   //获取对象
   $('.del').click(function(){
      // alert('111');
      //获取id
      id = $(this).parents('tr').find("td:first").html();
      // alert(id);
      // 获取当前的tr
      tr = $(this).parents('tr');
      $.get('/agdel',{id:id},function(data){
        // alert('11');
       alert(data.path);
      },'json')     
   });

 </script>
</html>

@endsection
@section('title','灯饰人生--商品列表')