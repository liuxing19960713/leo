@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="col-lg-18 grid-margin stretch-card"> 
   <div class="card"> 

    <div class="card-body">

     <h4 class="card-title">管理员列表</h4> 
     <p class="card-description"></p>
     <form action="" method="get">
    <div class="input-group">
    <input type="text" class="form-control" placeholder="用户名" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keywords" value="{{$request['keywords'] or ''}}"/>
     <div class="input-group-append">
     <input type="submit" class="btn btn-sm btn-gradient-primary" value="搜索">
     </div>
    </div>

    </form> 
     <table class="table table-hover"> 
      <thead> 
       <tr> 
        <th>id</th> 
        <th>用户名</th> 
        <th>权限</th> 
        <th>修改时间</th>
        <th>创建时间</th>
        <th>操作</th> 
       </tr> 
      </thead> 
      <tbody>
      @foreach($data as $row) 
       <tr> 
        <td>{{$row->id}}</td> 
        <td>{{$row->name}}</td>
        <td>{{$row->rid}}</td>
        <td>{{$row->updated_at}}</td> 
        <td>{{$row->created_at}}</td> 
      <td>
        <a href="/rolelist/{{$row->id}}" class="badge badge-warning">分配权限</a>
        <a href="javascript:void(0)" class="btn btn-sm btn-gradient-danger del">删除</a><a href="/administrator/{{$row->id}}/edit" class="btn btn-sm btn-gradient-info">修改</a></td>    
       </tr> 
        @endforeach
      </tbody> 
     </table>
     {{$data->appends($request)->render()}} 
     
    
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
 //alert($);
 $(".del").click(function(){
  //获取id
    id=$(this).parents("tr").find("td:first").html();
    // alert(id);    
    //获取删除数据所在的tr
    s=$(this).parents("tr");
    //Ajax
   $.ajax({
      url: '/administratordel',
      data: {id:id},
      success:function(data){
      data = data.replace(/\s/g, '');
        var obj = JSON.parse(data);
       if(obj.msg==1){
         alert("删除成功");
         //移除删除数据所在的tr
         s.remove();
       }else{
         alert("删除失败");
       }
     }
    });
 });
 </script>
</html>
@endsection
@section('title','管理员列表')