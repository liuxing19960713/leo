@extends("Admin.AdminPublic.publics")
@section('admin')
<html>
 <head></head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 <body>
  <div class="col-lg-18 grid-margin stretch-card"> 
   <div class="card"> 
    <div class="card-body"> 
     <h4 class="card-title">订单列表</h4> 
     <p class="card-description"></p>
     <form action="" method="get">
      <div class="input-group">
    <input type="text" class="form-control" placeholder="订单号" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keywords" value="{{$request['keywords'] or ''}}"/>
     <div class="input-group-append">
     <input type="submit" class="btn btn-sm btn-gradient-primary" value="搜索">
     </div>
    </form> 
     <table class="table table-hover"> 
      <thead> 
       <tr> 
        <th>id</th> 
        <th>订单号</th>
        <th>收货人姓名</th>
        <th>收货地址</th> 
        <th>联系电话</th> 
        <th>订单状态</th>
        <th>总价</th>
        <th>添加时间</th>
        <th>操作</th> 
       </tr> 
      </thead> 
      <tbody>
        @foreach($data as $row) 
       <tr>  
        <td>{{$row->id}}</td> 
        <td>{{$row->order_code}}</td>
        <td>{{$row->linkname}}</td>
        <td>{{$row->address}}</td> 
        <td>{{$row->tel}}</td>
        <td>{{$row->status}}</td>
        <td>{{$row->total}}</td>
        <td>{{$row->addtime}}</td>
       
        <td><a href="/order/{{$row->id}}" class="btn btn-sm btn-gradient-success ajdel">订单详情</a> 
        <a href="javascript:void(0)" class="btn btn-sm btn-gradient-info edit">{{$row->status}}</a></td>
     
       </tr>
       @endforeach 
      </tbody> 
     </table>
      {{$data->appends($request)->render()}}
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
 $(".edit").click(function(){
  kkk = $(this).parents("tr").find("td:first");
  id=$(this).parents("tr").find("td:first").html();
  status=$(this).html();
   //alert(status);
  $(this).removeClass('disable');
   
  // alert(status);
  // 判断是否可以点击按钮
 arr = new Array('未支付','待收货','订单完成');
 if (($.inArray(status,arr)) > -1) {
   // console.log('1');
   //把a标签变成换成不能提交效果
   $(this).addClass('disable');
   //获取该标签class 的对象
   isdisabled = $(this).hasClass('disable');
    //判断是否存在该class 名字
    if (isdisabled) {
      return false;
    };
 };

 var st = confirm('你确认要修改吗?');
  if (!st) {
    return false;
  };
   if(status=="已支付"){
   $(location).attr('href','/courier/'+id);
 }
  //Ajax
  //orderAjax
  
     $.ajax({
      url: '/orderAjax',
      data: {id:id,status:status},
      success:function(data){
      data = data.replace(/\s/g, '');
        var obj = JSON.parse(data);
    // console.log($(".edit").html());
    // 获取对应的数据  替换掉a标签里面html内容
    if (obj.msg == 1) {
    // alert(data.status);
    // console.log(kkk.parent().find('.edit').html(data.status));
      kkk.parent().find('.edit').html(obj.status);
    }else{
      alert('发生未知错误,修改失败!');
    };
    }
 });
  // alert(dos);
});
 </script>
</html>
@endsection
@section('title','订单列表')