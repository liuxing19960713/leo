@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="col-lg-18 grid-margin stretch-card"> 
   <div class="card"> 

    <div class="card-body">

     <h4 class="card-title">文章列表</h4> 
     <p class="card-description"></p>
     <form action="" method="get">
    <div class="input-group">
    <input type="text" class="form-control" placeholder="标题" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keywords" value="{{$request['keywords'] or ''}}"/>
     <div class="input-group-append">
     <input type="submit" class="btn btn-sm btn-gradient-primary" value="搜索">
     </div>
    </div>

    </form> 
     <table class="table table-hover"> 
      <thead> 
       <tr> 
        <th>id</th> 
        <th>标题</th>
        <th>前言</th> 
         
        <th>添加者</th>
        <th>状态</th>
        <th>添加时间</th>
        <th>操作</th> 
       </tr> 
      </thead> 
      <tbody>
      @foreach($data as $row) 
       <tr> 
        <td>{{$row->id}}</td> 
        <td>{{$row->title}}</td>
        <td>{{$row->head}}</td>
        
        <td>{{$row->admin['name']}}</td>
        <td class=" status btn btn-gradient-dark" style="margin-top: 20px;">{{$row->status}}</td>
        <td>{{$row->created_at}}</td> 
         
      <td>
        <a href="javascript:void(0)" class="btn btn-sm btn-gradient-danger del">删除</a><a href="/article/{{$row->id}}/edit" class="btn btn-sm btn-gradient-info">修改</a></td>    
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
 // alert($);
 $(".del").click(function(){
  //alert(1);
  //获取id
    id=$(this).parents("tr").find("td:first").html();
    //alert(id);    
    //获取删除数据所在的tr
    s=$(this).parents("tr");
    //alert(s);
    //Ajax
    // alert('1');
    // /articledel
    $.ajax({
      url: '/articledel',
      data: {id:id},
      // alert(1);
      // alert(data);
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

 $('.status').click(function(){
     // alert('hah ');
    //获取该链接的id
    id = $(this).parents('tr').find('td:first').html();
    // alert(id);
    //存储 该状态的td 的对象
    s = $(this).parents('tr').find('td:nth-child(5)');
    //获取状态
    // console.log(s);
    sta = $(this).parents('tr').find('td:nth-child(5)').html();
      //alert(sta);
    //ajax
    ///articleajax
    
      $.ajax({
      url: '/articleajax',
      data: {id:id,sta:sta},
      success:function(data){
      data = data.replace(/\s/g, '');
        var obj = JSON.parse(data);
        // console.log(dad.sta);
       if (obj.msg == 1) {
         alert('修改成功');
      //   console.log(data.sta);
        s.html(obj.sta);
       }else{
         alert('修改失败！');
       }
      }
    });

  });

 </script>
</html>
@endsection
@section('title','文章列表')