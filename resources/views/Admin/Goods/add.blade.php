@extends("Admin.AdminPublic.publics")
@section('admin')

<html>
 <head></head>
 <body>
  <form class="forms-sample" action="/agoods" method="post" enctype="multipart/form-data"> 
     <div class="form-group"> 
        <label for="exampleInputName1">Goods-Name</label> 
        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="goods_name" value="{{old('goods_name')}}" /> 
     </div> 
     <div class="form-group"> 
        <label for="exampleInputEmail3">品牌</label> 
        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="brank" name="brank" value="{{old('brank')}}" /> 
     </div> 
     <div class="form-group"> 
        <label for="exampleInputPassword4">价格</label> 
        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="price" name="price"  value="{{old('price')}}" /> 
     </div> 

       <div class="form-group"> 
        <label for="exampleInputPassword4">数量</label> 
        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="stock" name="stock" value="{{old('stock')}}" /> 
     </div> 

     <div class="form-group"> 
        <label for="exampleSelectGender">Belong-Category</label> 
        <select class="form-control" id="exampleSelectGender" name="cate_id">
          <option value="0">--请选择--</option>
          @foreach($info as $r) 
          <option value="{{$r->id}}">{{$r->name}}</option>
          @endforeach 
        </select> 
     </div> 
     <div class="form-group"> 
        <label>商品图</label> 
        <div class="input-group col-xs-12"> 
         <input type="file"multiple name="pic[]" class="form-control file-upload-info"  placeholder="Upload Image" /> 
         <span class="input-group-append"> <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button> </span> 
      </div> 
      <br>
      <div class="form-group"> 
        <label>商品主图片</label> 
        
        <div class="input-group col-xs-12"> 
         <input type="file" name="z_pic" class="form-control file-upload-info"  placeholder="Upload Image" /> 
         <span class="input-group-append"> <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button> </span> 
      </div>
     </div> 
     <div class="form-group"> 
        <label for="exampleInputCity1">厂家信息</label> 
        <input type="text" class="form-control" id="exampleInputCity1" name="commpany" placeholder="Location" value="{{old('commpany')}}" /> 
     </div> 
     <div class="form-group"> 
        <label for="exampleTextarea1">描述</label> 
        <textarea class="form-control" id="exampleTextarea1" name="desrc" rows="4" onkeyup="check(this)" maxlength="150">{{old('desrc')}}</textarea><span>您还可以输入<b id="bb">200</b></span> 
     </div> 
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button> 
     <button class="btn btn-light">Cancel</button> 
  </form>
 </body>
 <script>
  var bb = document.getElementById('bb');
  var num= 200;
  function check(obj)
  {
    //获取当前输入的字符串
    var msg = obj.value;
    //alert(msg);
    //alert(msg.length);
    //用总数减去当前字符串个数得到剩余的个数
    str = num -msg.length;
    //判断如果str 小于0 则设置0
    if(str <0){
      //obj.disabled = true;
      str =0;
    }

    bb.innerHTML = str;
    
  }
 </script>
</html>

@endsection
@section("title",'灯饰人生--商品添加')