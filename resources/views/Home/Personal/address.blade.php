@extends("Home.HomePublic.publics")
@section('home')

<html>
 <head>
 </head>

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
    <table class="table table-hover table-bordered" style="width: 1300px;height: auto;margin:0 auto;">
      <tr>
        <th>收货人名称</th>
        <th>手机</th>
        <th>邮编</th>
        <th>地址</th>
        <th>是否为默认地址</th>
        <th>添加时间</th>
        <th>修改时间</th>
        <th>操作</th>
      </tr>
      @if($address == '')
        <tr>
          <td colspan="7" style="text-align: center;">暂无数据</t>
        </tr>
      @else
  @foreach($address as $add)
      <tr>
        <td>{{$add->linkname}}</td>
        <td>{{$add->phone}}</td>
        <td>{{$add->mailbox}}</td>
        <td>{{$add->address}}</td>
        <td>
          @if($add->isDefault == 1)
            <span style="color: #CC3366;">默认</span>
          @else
            <span style="color :rgb(0,255,255)"><a href="/haddressmo/{{$add->id}}">设置为默认</a></span>
          @endif
        </td>
        <td>{{$add->created_at}}</td>
        <td>{{$add->updated_at}}</td>
        <td><a class="btn btn-primary btn-sm btn-block" href="/haddressedit/{{$add->uid}}-{{$add->id}}">修改</a><a class="btn btn-danger btn-block btn-sm" href="/haddressdel/{{$add->uid}}-{{$add->id}}">删除</a></td>
      </tr>
  @endforeach
      @endif

    </table>
  <div class="page-section mb-80">
  </div>
 </body>
</html>
@endsection
@section('title','灯饰人生')
