  <h4 class="card-title">管理员列表</h4> 
   <p class="card-description"></p> 
   <form action="" method="get"> 
    <div class="input-group"> 
     <input type="text" class="form-control" placeholder="用户名" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keywords" value="" /> 
     <div class="input-group-append"> 
      <input type="submit" class="btn btn-sm btn-gradient-primary" value="搜索" /> 
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
      <td>{{$row->level}}</td> 
      <td>{{$row->updated_at}}</td> 
      <td>{{$row->created_at}}</td> 
      <td><a href="javascript:void(0)" class="btn btn-sm btn-gradient-danger del">删除</a><a href="/administrator/1/edit" class="btn btn-sm btn-gradient-info">修改</a></td> 
     </tr> 
      @endforeach
     
    </tbody> 
   </table>

 

