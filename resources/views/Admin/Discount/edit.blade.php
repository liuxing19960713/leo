@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
   <script type="text/javascript" charset="utf-8" src="/UEditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/UEditor/ueditor.all.min.js"> </script>
 <body>
  <form class="forms-sample" action="/discount/{{$data->id}}" method="post" enctype="multipart/form-data">
     <div class="form-group">
        <label for="exampleInputName1">优惠属性(不超过6位数)</label>
       <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-gradient-primary text-white">满</span>
            </div>
            <select class="form-control form-control-lg" id="exampleSelectGender" name="max">
                <option value="">--请选择--</option>
                <option value="100" {{$data->max == 100?'selected':''}}>100</option>
                <option value="300" {{$data->max == 300?'selected':''}}>300</option>
                <option value="800" {{$data->max == 800?'selected':''}}>800</option>
                <option value="1000" {{$data->max == 1000?'selected':''}}>1000</option>
              </select>
            <div class="input-group-append">
              <span class="input-group-text">元</span>
            </div>
      </div>

        <br>
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text bg-gradient-primary text-white">减</span>
            </div>
             <select class="form-control form-control-lg" id="exampleSelectGender" name="minus">
                <option value="" >--请选择--</option>
                <option value="10" {{$data->minus == 10?'selected':''}}>10</option>
                <option value="50" {{$data->minus == 50?'selected':''}}>50</option>
                <option value="100" {{$data->minus == 100?'selected':''}}>100</option>
                <option value="150" {{$data->minus == 150?'selected':''}}>150</option>
              </select>
            <div class="input-group-append">
              <span class="input-group-text">元</span>
            </div>
      </div>
     </div>

     <div class="form-group">
        <label for="exampleSelectGender">请选择关联的分类折扣</label>
        <select class="form-control" id="exampleSelectGender" name="cid">
        @foreach($cc as $row)
          <option value="{{$row->id}}" {{$data->cid==$row->id?'selected':''}}>{{$row->name}}</option>
        @endforeach
        </select>
     </div>

     <div class="form-group">
        <label for="exampleSelectGender">状态</label>
        <select class="form-control" id="exampleSelectGender" name="status">
          <option value="0" {{$data->status=='上架'?'selected':''}} >上架</option>
          <option value="1" {{$data->status=='下架'?'selected':''}}>下架</option>
        </select>
     </div>

     <div class="form-group">
           <label for="ms">折扣描述(写一些注意事项,例如只能用与什么分类 1-20位)&nbsp;&nbsp;&nbsp;&nbsp;<label class="zi"></label></label>
            <input type="text" class="form-control desc" id="ms" name="describe" placeholder="注意事项" value="{{$data->describe}}" maxlength="20"/>
      </div>

      <div class="form-group">
           <label for="ks">开始时间</label>&nbsp;&nbsp;&nbsp;&nbsp;<label></label>
            <input type="datetime-local" class="form-control starttime"  id="ks" value="{{date('Y-m-d').'T'.date('H:i')}}" />
            <input type="hidden" name="start_time" value="{{$data->start_time}}">
      </div>

      <div class="form-group">
           <label for="js">结束时间</label>&nbsp;&nbsp;&nbsp;&nbsp;<label></label>
            <input type="datetime-local" class="form-control endtime" id="js" value="{{date('Y-m-d').'T'.date('H:i')}}"/>
            <input type="hidden" name="end_time" value="{{$data->end_time}}">
      </div>
     {{csrf_field()}}
     {{method_field('PUT')}}
     <button type="submit" class="btn btn-gradient-primary mr-2">提交</button>
     <button class="btn btn-light">重置</button>
  </form>
 </body>
 <script>
    //限定字数
    a = $('.zi');
    num = 20;
    a.html('<b style="color:red">还剩'+num+'位</b>');
    $('.desc').bind('input propertychange',function(){
      len = ($(this).val().length);
      $num = (num - len);
      // 剩余字数提醒
      if (len >= 20 ) {
        $text = $(this).val().substring(0,20);
        // console.log($text);
        $(this).val($text);
        $num = 0;
      }
      a.html('<b style="color:red">还剩'+$num+'位</b>');
    });
  //时间格式规范
  $s = $('.starttime').prev();
  // console.log($('.starttime').val());
  // 失去焦点
  $('.starttime').on('blur',function(){
    if($(this).val() == ''){
      $(this).css('border','1px red solid');
      $s.html('<b style="color:red">请选择时间</b>');
    }else{
      $s.html('');
      $(this).css('border','');
      aaa = $(this).val().replace(/T/ig," ");
      // alert(1);
      $('input[name="start_time"]').val(aaa);
      // console.log($('input[name="start_time"]').val());
      // $(this)
    }
  });

  $d = $('.endtime').prev();
   // 失去焦点
  $('.endtime').on('blur',function(){
    if($(this).val() == ''){
      $(this).css('border','1px red solid');
      $d.html('<b style="color:red">请选择时间</b>');
    }else{
      $d.html('');
      $(this).css('border','');
      ccc = $(this).val().replace(/T/ig," ");
      // alert(1);
      $('input[name="end_time"]').val(ccc);
      // console.log($('input[name="end_time"]').val());
      // $(this)
    }
  });
 </script>
</html>
@endsection
@section("title",'灯饰人生--优惠券编辑')
