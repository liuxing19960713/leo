@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="col-lg-18 grid-margin stretch-card"> 
   <div class="card"> 
    <div class="card-body"> 
     <h4 class="card-title">公司管理</h4> 
    <form class="d-flex align-items-center h-100" action="/company" method="get"> 
       <div class="input-group">
        <div class="input-group-prepend bg-transparent">
        <button type="submit">
         <i class="input-group-text border-0 mdi mdi-magnify"></i></button> 
        </div> 
        <input type="text" class="form-control bg-transparent border-0" placeholder="搜索" name="keywords" value="{{$request['keywords'] or ''}}" /> 
       </div> 
      </form> 
     <table class="table table-hover"> 
      <thead> 
       <tr> 
         <th>ID</th> 
         <th>公司名</th> 
         <th>公司地址</th> 
         <th>联系电话</th> 
         <th>版权信息</th>
         <th>创建时间</th>
         <th>修改时间</th>
         <th>修改时间</th> 
       </tr> 
      </thead> 
      <tbody> 
       @foreach($data as $row) 
      <tr> 
       <td>{{$row->id}}</td> 
       <td>{{$row->commpany}}</td> 
       <td>{{$row->commpany_address}}</td> 
       <td>{{$row->com_tel}}</td> 
       <td>{{$row->brank_conten}}</td>
       <td>{{$row->created_at}}</td>
       <td>{{$row->updated_at}}</td>
       <td><form action="/company/{{$row->id}}" method="post">
           {{csrf_field()}}
           {{method_field("DELETE")}}
           <button class="btn btn-outline-danger btn-fw ajdel " type="submit">删除</button>
           </form>
           <a href="/company/{{$row->id}}/edit" class="btn btn-outline-success btn-fw">修改</a>
        </td>
      </tr>
      @endforeach 
      </tbody> 
     </table>
     <!-- 分页 -->
      <div id="pull_right">
       <div class="pull-right">
          {{$data->render()}}
       </div>
      </div>
     <!-- 分页结束  -->
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生--后台管理系统')