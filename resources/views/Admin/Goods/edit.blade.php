@extends("Admin.AdminPublic.publics")
@section('admin')

<html>
 <head></head>
 <body>
  <form class="forms-sample" action="/agoods/{{$good_info->id}}" method="post" enctype="multipart/form-data">
     <div class="form-group">
        <label for="exampleInputName1">Goods-Name</label>
        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="goods_name" value="{{$good_info->goods_name}}" />
     </div>
     <div class="form-group">
        <label for="exampleInputEmail3">品牌</label>
        <input type="text" class="form-control" id="exampleInputEmail3" placeholder="brank" name="brank" value="{{$good_info->brank}}" />
     </div>
     <div class="form-group">
        <label for="exampleInputPassword4">价格</label>
        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="price" name="price" value="{{$good_info->price}}" />
     </div>
        {{method_field('PUT')}}
       <div class="form-group">
        <label for="exampleInputPassword4">数量</label>
        <input type="text" class="form-control" id="exampleInputPassword4" placeholder="stock" name="stock" value="{{$good_info->stock}}" />
     </div>

     <div class="form-group">
        <label for="exampleSelectGender">Belong-Category</label>
        <select class="form-control" id="exampleSelectGender" name="cate_id">
          <option value="0">--请选择--</option>
          @foreach($cateinfo as $r)
          <option value="{{$r->id}}" @if($r->id == $good_info->cate_id) selected  @endif>{{$r->name}} </option>
          @endforeach
        </select>
     </div>

     <div class="form-group">
        <label>商品主图</label>
        <div class="input-group col-xs-12">
         <input type="file" name="z_pic" class="form-control file-upload-info"  placeholder="Upload Image" />
         <span class="input-group-append"> <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button> </span>
      </div>

     <div class="form-group">
        <label>商品图</label>
        <div class="input-group col-xs-12">
         <input type="file"multiple name="pic[]" class="form-control file-upload-info"  placeholder="Upload Image" />
         <span class="input-group-append"> <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button> </span>
      </div>
      <br>

     <div class="form-group">
        <label for="exampleInputCity1">厂家信息</label>
        <input type="text" class="form-control" id="exampleInputCity1" name="commpany" placeholder="Location" value="{{$good_info->commpany}}" />
     </div>
     <div class="form-group">
        <label for="exampleTextarea1">描述</label>
        <textarea class="form-control" id="exampleTextarea1" name="desrc" rows="4">{{$good_info->desrc}}</textarea>
     </div>
     {{csrf_field()}}
     <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
     <button class="btn btn-light">Cancel</button>
  </form>
 </body>
</html>

@endsection
@section("title",'灯饰人生--商品编辑')
