@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="card-body"> 
   <h4 class="card-title">请添加商品分类</h4> 
   <p class="card-description">-- Please add Category --</p> 
   <form class="forms-sample" action="/acate/{{$data->id}}" method="post" enctype="multipart/form-data"> 
        <div class="form-group"> 
         <label for="exampleInputName1">分类名称</label> 
         <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" value="{{$data->name}}" /> 
        </div> 
        
      

        <div class="form-group"> 
         <label for="exampleSelectGender">请选择类型</label> 
         <select class="form-control" id="exampleSelectGender" name="pid"> 
            <option value="0">--请选择--</option> 
            @foreach ($cate as $r)
            <option value="{{$r->id}}" @if($data->pid == $r->id) selected 
            @endif>
            {{$r->name}}

             
            </option>
            
          @endforeach
         </select> 

         {{csrf_field()}}
        {{ method_field('PUT') }}
        </div> 
 
        <button class="btn btn-light">添加</button> 
   </form> 
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生--编辑分类')