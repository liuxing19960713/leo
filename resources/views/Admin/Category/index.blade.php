@extends("Admin.AdminPublic.publics")
@section('admin')

<html>
 <head></head>
<script src="/static/admins/js/jquery-1.8.3.min.js"></script>
 <body>
 <div class="card"> 
  <div class="card-body"> 

   <h4 class="card-title">category_list</h4> 
   <p class="card-description"> Category class <code>.table-bordered</code> </p> 
     <form action="/acate" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
            <div class="input-group-append">
              <button class="btn btn-sm btn-gradient-primary" type="button">Search</button>
            </div>
        </div>
      </form>
   <table class="table table-bordered"> 
    <thead> 
     <tr> 
      <th>序列号</th>
      <th>分类名-name</th> 
      <th>pid</th> 
      <th>path</th> 
      <th>Status</th> 
      <th>操作</th>
     </tr> 
    </thead> 
    <tbody> 
     @foreach($cate as $r) 
     <tr align="center"> 
      <td>{{$r->id}}</td>
      <td>{{$r->name}}</td> 
      <td>{{$r->pid}}</td> 
      <td>{{$r->path}}</td> 
      <td>
          @if($r->status==1)
           开启
           <!--  <button type="button" class="btn btn-gradient-danger btn-rounded btn-fw status"></button> -->
          @else
            关闭
        <!--   <button type="button" class="btn btn-gradient-dark btn-rounded btn-fw close"></button> -->
          @endif        
      </td>
      <td>
        <a href="/acate/{{$r->id}}/edit" class="btn btn-outline-success btn-fw">修改</a>
        <a href="JavaScript:void(0)" class="btn btn-outline-danger btn-fw ajdel">删除</a>
      </td> 
     </tr> 
    @endforeach
     
    </tbody> 
   </table> 
  </div>
  </div>
    <div id="pull_right">
       <div class="">
          {{$cate->appends($request)->render()}}
       </div>
    </div>
    <!-- </div> -->
  <script>
       // alert($);
       $('.ajdel').click(function(){
          // 找到当前id
          id = $(this).parents("tr").find("td:first").html();
          // alert(id);
          //找到当前tr
          tr = $(this).parents("tr");
           $.ajax({
        url: '/acadel',
        data: {id:id},
        success:function(data){
        data = data.replace(/\s/g, '');
        var obj = JSON.parse(data);
            if(obj.msg==1){
              tr.remove();
              alert('删除成功');
            }else if(obj.msg==3){
              alert('还存在子分类');              
            }else{
              alert("删除error");
            }
          }
          })
       });
 </script>
 </body>
</html>

@endsection
@section('title','灯饰人生--分类列表')