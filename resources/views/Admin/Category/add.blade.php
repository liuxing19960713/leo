@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <body>
  <div class="card-body"> 
   <h4 class="card-title">请添加商品分类</h4> 
   <p class="card-description">-- Please add Category --</p> 
   <form class="forms-sample" action="/acate" method="post" > 
        <div class="form-group"> 
         <label for="exampleInputName1">分类名称</label> 
         <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name" /> 
        </div> 
        
      

        <div class="form-group"> 
         <label for="exampleSelectGender">请选择类型</label> 
         <select class="form-control" id="exampleSelectGender" name="pid"> 
            <option value="0">--请选择--</option> 
            @foreach ($data as $r)
            <option value="{{$r->id}}">{{$r->name}}</option>
          @endforeach
         </select> 

         {{csrf_field()}}
        </div> 

       <!--  <div class="form-group"> 
         <label>File upload</label> 
         <input type="file" name="img[]" class="file-upload-default" /> 
         <div class="input-group col-xs-12"> 
          <input type="file" class="form-control file-upload-info"  placeholder="Upload Image" /> 
          <span class="input-group-append"> <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button> </span> 
         </div> 
        </div>  -->
       <!--  <div class="form-group"> 
         <label for="exampleInputCity1">City</label> 
         <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location" /> 
        </div> 
        <div class="form-group"> 
         <label for="exampleTextarea1">Textarea</label> 
         <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea> 
        </div> 
        <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>  -->
        <button class="btn btn-light">添加</button> 
   </form> 
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生--添加分类')