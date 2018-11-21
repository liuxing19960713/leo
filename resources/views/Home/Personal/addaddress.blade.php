@extends("Home.HomePublic.publics")
@section('home')

  <html>
 <head></head>
 <body>
  <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <div class="breadcrumb-container">
       <ul>
        <li><a href="/mypersonal">个人首页</a> <span class="separator">/</span></li>
        <li class="active"><a href="/haddress/{{session('hid')}}">地址管理</a></li>
        <li><span class="separator">/</span><a href="/haddaddress">添加地址</a> </li>
       </ul>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="page-section mb-80">
   <div class="container">
    <div class="row">
     <div class="col-12">
      <!-- Checkout Form s-->
      <form action="/mypersonal" class="checkout-form" method="post">
       <div class="row row-40">
        <div class="col-lg-7 mb-20">
         <!-- Billing Address -->
         <div id="billing-form" class="mb-40">
          <h4 class="checkout-title">添加收货地址</h4>
          <div class="row">
           <div class="col-md-6 col-12 mb-20">
            <label>收货人</label>
            <input type="text" placeholder="收货人名称" name="linkname" required="required" value="{{old('linkname')}}"/>
           </div>

           <div class="col-md-6 col-12 mb-20">
            <label>邮编地址</label>
            <input type="number" placeholder="邮编" oninput="if(value.length>6)value=value.slice(0,6)" name="mailbox" required="required" value="{{old('mailbox')}}"/>
           </div>
           <div class="col-12 mb-20">
            <label>电话号码</label>

            <input type="telephone" name="phone"  required="required" pattern="^(0|86|17951)?(13[0-9]|15[012356789]|17[0678]|18[0-9]|14[57])[0-9]{8}" placeholder="电话号码" value="{{old('phone')}}" >
           </div>

      <div class="form-group">
         <label class="col-sm-8 control-label">收货地址</label>
          <div class="col-sm-10">

            <!-- 三级联动 -->
              <select id="sid" class="aaa selectpicker show-tick form-control">
                <option value="" class="ss">--请选择--</option>
              </select>
              <input type="hidden" name="city">
            <!-- 三级联动结束 -->

            <input type="hidden" name="uid" value="{{session('hid')}}">

        </div>
    </div>
        {{csrf_field()}}
          <div class="col-12 mb-20">
            <label>详细地址</label>
            <input type="text" placeholder="详细地址(小区名,栋号,房号)" class="xi" name="xiang" value="{{old('xiang')}}" required="required"/>
          </div>

          <button type="submit" class="place-order sub">提交</button>
            <span>&nbsp;&nbsp;&nbsp;</span>
          <button type="reset" class="place-order">重置</button>
           </div>
          </div>
         </div>



       </div>
      </form>
     </div>
    </div>
   </div>
  </div>
 </body>
 <script>
  //地址获取
  //第一级别获取

   $.ajax({
      url:'/city',
      data:{upid:0},
      // dataType:'json',
      success: function(data){
        // console.log(typeof data);
        // console.log(data);
        // 返回的是字符串，就是因为加了两行空行
        data = data.replace(/\s/g, '');
        // 获取到了一级的城市
        var obj = JSON.parse(data);
        console.log(obj);
        // 禁止选中
        $('.ss').attr('disabled','disabled');

        // 将得到的json数组对象  遍历到每个对象
        for(var i=0;i<obj.length;i++)
        {
          // console.log(obj[i].name);
          // 将我们得到的地址名称写在option标签中
          var info = $('<option value="'+obj[i].id+'">'+obj[i].name+'</option>');
          // alert(info);
          // 将得到的option标签放入到select对象中
          $('#sid').append(info);
        }
      },
      error: function(res){
        console.log(res);
      }
   });

   // 只要选择器相同就可以有相应的时间
   $('select').live('change',function(){
        // 获取父元素  div
        dd = $(this).parent('div');
        // 将当前的对象存储起来
        oo = $(this);
        // 通过id来查找下一个
        id = $(this).val();
        // 清楚所有其他的select
        oo.nextAll('select').remove();
        // 获取其他地方
        $.ajax({
            url:'/city',
            data:{upid:id},
            // dataType:'json',
            success: function(data){
              // 返回的是字符串，就是因为加了两行空行
              data = data.replace(/\s/g, '');
              // 获取到了一级的城市
              var result = JSON.parse(data);
                if(result != ''){
                  // 创建一个div对象
                  var div = $('<div class="col-sm-10"></div>');
                  // 创建一个select 标签对象
                  var select = $('<select class="aaa selectpicker show-tick form-control" style="float:left;"></select>');
                  // 防止当前城市没有办法选择
                  // 所以我们先写上一个请选择option
                  var op = $('<option class="mm">--请选择--</option>');
                  // div.append(select);
                  select.append(op);
                  // 循环得到的数组里面的option标签添加到select
                  for(var i = 0 ;i<result.length;i++){
                    var infos = $('<option value="'+result[i].id+'">'+result[i].name+'</option>');
                    //将option 标签添加到select 标签中
                    select.append(infos);
                  }

                  // 将select 标签添加到当前标签的后面
                  oo.after(select);

                  $('.mm').attr('disabled','true');
                }
            },
             error: function(res){
            }
        });
   });

 // 获取选中的数据提交操作页面
    $('.sub').on('click',function(){
        arr = [];
        $('.aaa').each(function(){
            // 获取 当前select被选中的option标签文本
            opdata = $(this).find('option:selected').html();
            // 将我们得到的每个值放置到数组中 push()
            arr.push(opdata);
        })
        //将得到的数组直接赋值给隐藏域的value值即可
        $('input[name=city]').val(arr);
    })
 </script>
</html>

@endsection
@section('title','灯饰人生')
