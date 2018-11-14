@extends("Admin.AdminPublic.publics")
@section('admin')

<html>
 <head></head>
   <script type="text/javascript" charset="utf-8" src="/UEditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/UEditor/ueditor.all.min.js"> </script>
 <body>
  <form class="forms-sample" action="/agoods" method="post" enctype="multipart/form-data"> 
     <div class="form-group"> 
        <label for="exampleInputName1">优惠券名</label> 
        <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="yname" value="{{old('yname')}}" /> 
     </div> 

     <div class="form-group"> 
        <label for="exampleSelectGender">请选择关联的商品折扣</label> 
        <select class="form-control" id="exampleSelectGender" name="gid">
          <option value="0">--请选择--</option>
         
          <option value=""></option>
        </select> 
     </div> 
     <div class="form-group"> 
        <label>优惠券LOGO</label> 
        <div class="input-group col-xs-12"> 
         <input type="file"  name="logo" class="form-control file-upload-info"  placeholder="Upload Image" /> 
         <span class="input-group-append"> <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button> </span> 
      </div> 
      <br>
       
     <div class="form-group"> 
        <label for="exampleInputCity1">折扣</label> 
        <input type="text" class="form-control" id="exampleInputCity1" name="discount" placeholder="Location" value="{{old('discount')}}" /> 
     </div> 
     <div class="form-group"> 
        <label for="exampleTextarea1">折扣描述</label> 
    <script id="editor" type="text/plain"  name="derc" style="width:700px;height:500px;"></script>
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/UEditor/lang/zh-cn/zh-cn.js"></script>


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

 <script type="text/javascript">
               //实例化编辑器
               //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
               var ue = UE.getEditor('editor');
 </script>
</html>

@endsection
@section("title",'灯饰人生--商品添加')