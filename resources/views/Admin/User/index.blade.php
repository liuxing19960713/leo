@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-lg-18 grid-margin stretch-card"> 
   <div class="card"> 
    <div class="card-body"> 
     <h4 class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户列表</font></font></h4> 
      <form action="" method="get">
     <div class="input-group">
    <input type="text" class="form-control" placeholder="用户名" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keywords" value="{{$request['keywords'] or ''}}"/>
     <div class="input-group-append">
     <input type="submit" class="btn btn-sm btn-gradient-primary" value="搜索">
     </div>
    </form>
    <table class="table table-bordered"> 
    <thead> 
     <tr> 
      <th>id</th> 
      <th>联系方式</th>
      <th>真实名字</th> 
      <th>创建时间</th> 
      <th>修改时间</th> 
 
     </tr> 
    </thead> 
    <tbody>
      @foreach($data as $row) 
     <tr> 
      <td>{{$row->id}}</td> 
      <td class="mdi mdi-phone-forward"> {{$row->uname}}</td>
      <td>{{$row->true_name or '暂无设置'}}</td>
      <td>{{$row->updated_at}}</td> 
      <td>{{$row->created_at}}</td> 
     </tr>
     @endforeach 
    </tbody> 
   </table>
   {{$data->appends($request)->render()}}
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','用户列表')