@extends("Home.HomePublic.publics")
@section('home')
  <!--=============================================
    =            Breadcrumb Area         =
    =============================================-->
<html>
 <head>
  <link rel="stylesheet" href="cbootstrap.min.css">
  <link href="/static/public/css/admin.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/amazeui.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/personal.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/cpstyle.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/orstyle.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/infstyle.css" rel="stylesheet" type="text/css">
  <script src="/static/jquery-1.7.2.min.js"></script>
  <script src="/static/public/js/jquery.min.js"></script>
  <script src="/static/public/js/bootstrap.min.js"></script>
  <script src="/static/public/js/holder.min.js"></script>
  <script src="/static/public/jquery.min.js"></script>
  <script src="/static/public/js/amazeui.js"></script>
</head>

 <body>

<div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80" style="background-image:none;">
   <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <div class="">
       <ul>
        
       </ul>
      </div>
     </div>
    </div>
   </div>
</div>
  <!--=====  End of Breadcrumb Area  ======-->
  <!--=============================================
    =            My Account page content         =
    =============================================-->
<div class="page-section mb-80">
<div class="container">
<div class="row">
<div class="col-12">
<div class="row">
 <!-- My Account Tab Menu Start -->
 <div class="col-lg-3 col-12">
  <div class="myaccount-tab-menu nav" role="tablist">
   <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i> 仪表板</a>
   <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> 订单</a>
   <a href="#cogoods" data-toggle="tab"><i class="fa fa-cloud-download"></i> 收藏</a>
   <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i>安全设置</a>
   <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> 我的优惠劵</a>
   <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> 地址</a>
   <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> 账户详细资料</a>
  <a href="#announce" data-toggle="tab"><i class="fa fa-user"></i>消息</a>
   <a href="login-register.html"><i class="fa fa-sign-out"></i> 登出</a>
  </div>
 </div>
 <!-- My Account Tab Menu End -->
 <!-- My Account Tab Content Start -->
 <div class="col-lg-9 col-12">
  <div class="tab-content" id="myaccountContent">
   <!-- Single Tab Content Start -->
   <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
    <div class="myaccount-content">
     <h3>欢迎</h3>
     <div class="welcome mb-20">
      <p>你好, <strong>{{session('username')}}</strong> (如果不是 <strong>Tuntuni !</strong><a href="/loginout/{{session('hid')}}" class="logout"> 退出</a>)</p>
     </div>
     <p class="mb-0">来自您的帐户信息中心。您可以轻松查看和查看最近的订单,管理您的送货和帐单地址，以及修改密码和帐户详细信息。</p>
    </div>
   </div>

   <!-- Single Tab Content End -->
   <!-- Single Tab Content Start -->
   <div class="tab-pane fade" id="orders" role="tabpanel">
    <div class="myaccount-content">
     
     <div class="myaccount-table table-responsive text-center" style="width: 150%">
      <table class="table table-bordered">
          <div class="myaccount-content">
      


      
      <!-- 订单开始 -->
      <div class="user-order"> 
       <!--标题 --> 
       <div class="am-cf am-padding"> 
       
       </div> 
       <hr /> 
       <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs=""> 
        <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs"> 
         <li class="am-active"><a href="#tab1">所有订单</a></li> 
         <li class=""><a href="#tab2">待付款</a></li> 
         <li class=""><a href="#tab3">待发货</a></li> 
         <li class=""><a href="#tab4">待收货</a></li> 
         <li class=""><a href="#tab5">待评价</a></li> 
        </ul> 
        <div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"> 
         <div class="am-tab-panel am-fade am-active am-in" id="tab1"> 
          <div class="order-top"> 
           <div class="th th-item">
             商品 
           </div> 
           <div class="th th-price">
             单价 
           </div> 
           <div class="th th-number">
             数量 
           </div> 
           <div class="th th-operation">
             商品操作 
           </div> 
           <div class="th th-amount">
             合计 
           </div> 
           <div class="th th-status">
             交易状态 
           </div> 
           <div class="th th-change">
             交易操作 
           </div> 
          </div> 
          <div class="order-main"> 
           <div class="order-list"> 

            <!--交易成功--> 
            @foreach($order as $da)
       
            <div class="order-status5"> 
             <div class="order-title"> 
              <div class="dd-num">
               订单编号8--所有订单
               <a href="javascript:;">{{$da->order_code}}0</a>
              </div> 
              <span>成交时间：{{$da->addtime}}</span> 
              <!--    <em>店铺：小桔灯</em>--> 
             </div> 
             <div class="order-content"> 
              <div class="order-left"> 
               <ul class="item-list"> 
                <li class="td td-item"> 
                 <div class="item-pic"> 
                  <a href="#" class="J_MakePoint"> <img src="/static/admin/uploads/z_goods/{{$da->pic}}" class="itempic J_ItemImg" /> </a> 
                 </div> 
                 <div class="item-info"> 
                  <div class="item-basic-info"> 
                   <a href="#"> <p>{{$da->gname}}</p></a> 
                  </div> 
                 </div> </li> 
                <li class="td td-price"> 
                 <div class="item-price">
                   {{$da->price}}
                 </div> </li> 
                <li class="td td-number"> 
                 <div class="item-number"> 
                  <span>&times;</span>{{$da->onum}} 
                 </div> </li> 
                <li class="td td-operation"> 
                 <div class="item-operation"> 
                 </div> </li> 
               </ul> 
              </div> 
              <div class="order-right"> 
               <li class="td td-amount"> 
                <div class="item-amount" >
                  合计：{{$da->total}} 
                 <p>含优惠券<span>10.00</span></p> 
                </div> </li> 
                    

               <div class="move-right"> 
                @if($da->status=='0')
                     <li class="td td-status"> 
                     <div class="item-status"> 
                      <p class="Mystatus">等待买家付款</p> 
                     </div> </li>
                     <li class="td td-change"> 
                       <a href="/pays/{{$da->oid}}" class="am-btn am-btn-danger anniu">
                         一键支付
                       </a> </li> 

                  @elseif($da->status == '1')
                       <li class="td td-status"> 
                       <div class="item-status"> 
                        <p class="Mystatus">买家已付款</p> 
                        <p class="order-info"><a href="/horderinfo/{{$da->oid}}">订单详情</a></p> 
                        <p class="order-info"><a href="/wuliu/{{$da->order_code}}">查看物流</a></p> 
                       </div> </li> 
                      <li class="td td-change"> 
                       <div class="am-btn am-btn-danger anniu">
                         删除订单
                       </div></li>
                      @elseif($da->status== '2')
                        <li class="td td-status"> 
                       <div class="item-status"> 
                        <p class="Mystatus">卖家已发货</p> 
                        <p class="order-info"><a href="/horderinfo/{{$da->oid}}">订单详情</a></p> 
                        <p class="order-info"><a href="/wuliu/{{$da->order_code}}">查看物流</a></p> 
                        <p class="order-info"><a href="logistics.html">延长收货</a></p> 

                       </div> </li> 
                      <li class="td td-change"> 
                       <a href="/confirm/{{$da->oid}}" class="am-btn am-btn-danger anniu">
                         确认收货
                       </a></li>

                        @elseif($da->status == '3')
                           <li class="td td-status"> 
                           <div class="item-status"> 
                            <p class="Mystatus">交易成功</p> 
                            <p class="order-info"><a href="/horderinfo/{{$da->oid}}">订单详情</a></p> 
                            <p class="order-info"><a href="/wuliu/{{$da->order_code}}">查看物流</a></p> 
                           </div> </li> 
                          <li class="td td-change"> 
                           <div class="am-btn am-btn-danger anniu">
                             评价商品
                           </div> </li> 
                        @else
                         <li class="td td-status"> 
                           <div class="item-status"> 
                            <p class="Mystatus">交易完成</p> 
                            <p class="order-info"><a href="/horderinfo/{{$da->oid}}">订单详情</a></p>
                            <p class="order-info"><a href="/wuliu/{{$da->order_code}}">查看物流</a></p> 
                           </div> </li> 
                      @endif
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                  @endforeach
                  <!-- 所有订单 -->


                 </div> 
                </div> 
               </div> 
               <div class="am-tab-panel am-fade" id="tab2"> 
                <div class="order-top"> 
                 <div class="th th-item">
                   商品 
                 </div> 
                 <div class="th th-price">
                   单价 
                 </div> 
                 <div class="th th-number">
                   数量 
                 </div> 
                 <div class="th th-operation">
                   商品操作 
                 </div> 
                 <div class="th th-amount">
                   合计 
                 </div> 
                 <div class="th th-status">
                   交易状态 
                 </div> 
                 <div class="th th-change">
                   交易操作 
                 </div> 
                </div> 
                <div class="order-main"> 
                 <div class="order-list">
                  @foreach($order as $d)
                  @if($d->status==0)
                  <div class="order-status1"> 
                   <div class="order-title"> 
                    <div class="dd-num">
                     订单编号3：--待付款
                     <a href="javascript:;">{{$d->order_code}}</a>
                    </div> 
                    <span>成交时间：{{$d->addtime}}</span> 
                    <!--    <em>店铺：小桔灯</em>--> 
                   </div> 
                   <div class="order-content"> 
                    <div class="order-left"> 
                    
                      
                     <ul class="item-list"> 
                      <li class="td td-item"> 
                       <div class="item-pic"> 
                        <a href="#" class="J_MakePoint"> <img src="/static/admin/uploads/z_goods/{{$d->pic}}" class="itempic J_ItemImg" /> </a> 
                       </div> 
                       <div class="item-info"> 
                        <div class="item-basic-info"> 
                         <a href="#"> <p>{{$d->gname}}</p>  </a> 
                        </div> 
                       </div> </li> 
                      <li class="td td-price"> 
                       <div class="item-price">
                         {{$d->price}}
                       </div> </li> 
                      <li class="td td-number"> 
                       <div class="item-number"> 
                        <span>&times;</span>{{$d->onum}} 
                       </div> </li> 
                      <li class="td td-operation"> 
                       <div class="item-operation"> 
                       </div> </li> 
                     </ul> 
                    </div> 
                    <div class="order-right"> 
                     <li class="td td-amount"> 
                      <div class="item-amount" >
                        合计：{{$d->total}}
                       <!-- <p>含优惠券<span>10.00</span></p>  -->
                      </div> </li> 
                     <div class="move-right"> 
                      <li class="td td-status"> 
                       <div class="item-status"> 
                        <p class="Mystatus">等待买家付款</p> 
                        <p class="order-info"><a href="#">取消订单</a></p> 
                       </div> </li> 
                      <li class="td td-change"> <a href="pay.html"> 
                        <a href="/pays/{{$d->oid}}" class="am-btn am-btn-danger anniu">
                          一键支付
                        </a></a> </li> 
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                  @endif
                  @endforeach
                 </div> 
                </div> 
               </div> 
               <div class="am-tab-panel am-fade" id="tab3"> 
                <div class="order-top"> 
                 <div class="th th-item">
                   商品 
                 </div> 
                 <div class="th th-price">
                   单价 
                 </div> 
                 <div class="th th-number">
                   数量 
                 </div> 
                 <div class="th th-operation">
                   商品操作 
                 </div> 
                 <div class="th th-amount">
                   合计 
                 </div> 
                 <div class="th th-status">
                   交易状态 
                 </div> 
                 <div class="th th-change">
                   交易操作 
                 </div> 
                </div> 
                <div class="order-main"> 
                 <div class="order-list">
                  @foreach($order as $df)
                  @if($df->status ==1)
                  <div class="order-status2"> 
                   <div class="order-title"> 
                    <div class="dd-num">
                     订单编号4：//代发货
                     <a href="javascript:;">{{$df->order_code}}</a>
                    </div> 
                    <span>成交时间：{{$df->addtime}}</span> 
                    <!--    <em>店铺：小桔灯</em>--> 
                   </div> 
                   <div class="order-content"> 
                    <div class="order-left"> 
                   
                    
                     <ul class="item-list"> 
                      <li class="td td-item"> 
                       <div class="item-pic"> 
                        <a href="#" class="J_MakePoint"> <img src="/static/admin/uploads/z_goods/{{$df->pic}}" class="itempic J_ItemImg" /> </a> 
                       </div> 
                       <div class="item-info"> 
                        <div class="item-basic-info"> 
                         <a href="#"> <p>{{$df->gname}}</p> </a> 
                        </div> 
                       </div> </li> 
                      <li class="td td-price"> 
                       <div class="item-price">
                       {{$df->price}}
                       </div> </li> 
                      <li class="td td-number"> 
                       <div class="item-number"> 
                        <span>&times;</span>2 
                       </div> </li> 
                      <li class="td td-operation"> 
                       <div class="item-operation"> 
                        <a href="refund.html">退款</a> 
                       </div> </li> 
                     </ul> 
                    </div> 
                    <div class="order-right"> 
                     <li class="td td-amount"> 
                      <div class="item-amount" >
                        合计：{{$df->total}}
                       <!-- <p>含优惠券<span>10.00</span></p>  -->
                      </div> </li> 
                     <div class="move-right"> 
                      <li class="td td-status"> 
                       <div class="item-status"> 
                        <p class="Mystatus">买家已付款</p> 
                        <p class="order-info"><a href="/horderinfo/{{$df->oid}}">订单详情</a></p> 
                       </div> </li> 
                      <li class="td td-change"> 
                       <div  class="am-btn am-btn-danger anniu tixing" disabled>
                         等待发货
                       </div> </li> 
                     </div> 
                    </div> 
                   </div> 
                  </div>
                  @endif
                  @endforeach

                 </div> 
                </div> 
               </div> 
               <div class="am-tab-panel am-fade" id="tab4"> 
                <div class="order-top"> 
                 <div class="th th-item">
                   商品 
                 </div> 
                 <div class="th th-price">
                   单价 
                 </div> 
                 <div class="th th-number">
                   数量 
                 </div> 
                 <div class="th th-operation">
                   商品操作 
                 </div> 
                 <div class="th th-amount">
                   合计 
                 </div> 
                 <div class="th th-status">
                   交易状态 
                 </div> 
                 <div class="th th-change">
                   交易操作 
                 </div> 
                </div> 
                <div class="order-main"> 
                 <div class="order-list">
                  <!--  -->
                  @foreach($order as $ds)
                  @if($ds->status == 2)
                  <div class="order-status3"> 
                   <div class="order-title"> 
                    <div class="dd-num">
                     订单编号5：//待收货
                     <a href="javascript:;">{{$ds->order_code}}</a>
                    </div> 
                    <span>成交时间：{{$ds->addtime}}</span> 
                    <!--    <em>店铺：小桔灯</em>--> 
                   </div> 
                   <div class="order-content"> 
                    <div class="order-left"> 
                     <ul class="item-list"> 
                      <li class="td td-item"> 
                       <div class="item-pic"> 
                        <a href="#" class="J_MakePoint"> <img src="/static/admin/uploads/z_goods/{{$ds->pic}}" class="itempic J_ItemImg" /> </a> 
                       </div> 
                       <div class="item-info"> 
                        <div class="item-basic-info"> 
                         <a href="#"> <p>{{$ds->gname}} </p> </a> 
                        </div> 
                       </div> </li> 
                      <li class="td td-price"> 
                       <div class="item-price">
                         {{$ds->price}}
                       </div> </li> 
                      <li class="td td-number"> 
                       <div class="item-number"> 
                        <span>&times;</span>2 
                       </div> </li> 
                      <li class="td td-operation"> 
                       <div class="item-operation"> 
                        <a href="refund.html">退款/退货</a> 
                       </div> </li> 
                     </ul> 
                    </div> 
                    <div class="order-right"> 
                     <li class="td td-amount"> 
                      <div class="item-amount" >
                        合计：{{$ds->total}}
                       <!-- <p>含优惠券<span>10.00</span></p>  -->
                      </div> </li> 
                     <div class="move-right"> 
                      <li class="td td-status"> 
                       <div class="item-status"> 
                        <p class="Mystatus">卖家已发货</p> 
                        <p class="order-info"><a href="/horderinfo/{{$ds->oid}}">订单详情</a></p> 
                        <p class="order-info"><a href="/wuliu/{{$ds->order_code}}">查看物流</a></p> 
                        <p class="order-info"><a href="#">延长收货</a></p> 
                       </div> </li> 
                      <li class="td td-change"> 
                       <a href="/confirm/{{$ds->oid}}" class="am-btn am-btn-danger anniu">
                         确认收货
                       </a> </li> 
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                  @endif
                  @endforeach

                 </div> 
                </div> 
               </div> 
               <div class="am-tab-panel am-fade" id="tab5"> 
                <div class="order-top"> 
                 <div class="th th-item">
                   商品 
                 </div> 
                 <div class="th th-price">
                   单价 
                 </div> 
                 <div class="th th-number">
                   数量 
                 </div> 
                 <div class="th th-operation">
                   商品操作 
                 </div> 
                 <div class="th th-amount">
                   合计 
                 </div> 
                 <div class="th th-status">
                   交易状态 
                 </div> 
                 <div class="th th-change">
                   交易操作 
                 </div> 
                </div> 
                <div class="order-main"> 
                 <div class="order-list"> 
                  <!--不同状态的订单 --> 
                  @foreach($order as $pj)
                  @if($pj->status==3)
                  <div class="order-status4"> 
                   <div class="order-title"> 
                    <div class="dd-num">
                     订单编号7：
                     <!-- 待评价 -->
                     <a href="javascript:;">{{$pj->order_code}}</a>
                    </div> 
                    <span>成交时间：{{$pj->addtime}}</span> 
                    <!--    <em>店铺：小桔灯</em>--> 
                   </div> 
                   <div class="order-content"> 
                    <div class="order-left"> 
                      
                    
                     <ul class="item-list"> 
                      <li class="td td-item"> 
                       <div class="item-pic"> 
                        <a href="#" class="J_MakePoint"> <img src="/static/admin/uploads/z_goods/{{$pj->pic}}" class="itempic J_ItemImg" /> </a> 
                       </div> 
                       <div class="item-info"> 
                        <div class="item-basic-info"> 
                         <a href="#"> <p>{{$pj->gname}}</p> </a> 
                        </div> 
                       </div> </li> 
                      <li class="td td-price"> 
                       <div class="item-price">
                        {{$pj->price}}
                       </div> </li> 
                      <li class="td td-number"> 
                       <div class="item-number"> 
                        <span>&times;</span>{{$pj->onum}} 
                       </div> </li> 
                      <li class="td td-operation"> 
                       <div class="item-operation"> 
                        <a href="refund.html">退款/退货</a> 
                       </div> </li> 
                     </ul> 
                    </div> 
                    <div class="order-right"> 
                     <li class="td td-amount"> 
                      <div class="item-amount" >
                        合计：{{$pj->total}} 
                       <p>含优惠券<span>10.00</span></p> 
                      </div> </li> 
                     <div class="move-right"> 
                      <li class="td td-status"> 
                       <div class="item-status"> 
                        <p class="Mystatus">交易成功</p> 
                        <p class="order-info"><a href="/horderinfo/{{$pj->oid}}">订单详情</a></p> 
                        <p class="order-info"><a href="/wuliu/{{$pj->order_code}}">查看物流</a></p> 
                       </div> </li> 
                      <li class="td td-change"> <a href="commentlist.html"> 
                        <a href="/hcomment/{{$pj->oid}}-{{$pj->gid}}" class="am-btn am-btn-danger anniu">
                          评价商品
                        </a> </a> </li> 
                     </div> 
                    </div> 
                   </div> 
                  </div> 
                 </div>
                 @endif
                 @endforeach 
                </div> 
               </div> 
              </div> 
             </div> 
            </div>
            <!-- 订单结束 -->
          </div>
            </table>
           </div>
          </div>
         </div>

         <!-- Single Tab Content End -->
         <!-- Single Tab Content Start -->
         <div class="tab-pane fade" id="cogoods" role="tabpanel">
          <div class="myaccount-content">
           <h3>收藏商品</h3>
           <div class="myaccount-table table-responsive text-center">
            <table class="table table-bordered">
             <thead class="thead-light">
              <tr>
               <th>名字</th>
               <th>单价</th>
               <th>图片</th>
               <th>收藏时间</th>
               <th>操作</th>
              </tr>
             </thead>
             <tbody>
             @foreach($cogoods as $row)
              <tr>
               <td>{{$row->goods_name}}</td>
               <td>{{$row->price}}</td>
               <td><img src="/static/admin/uploads/z_goods/{{$row->z_pic}}" width="100" height="75" style="text-align:center"></td>
               <td>{{$row->create_at}}</td>
               <td><a gid="{{$row->id}}" href="javascript:void(0)" class="btn d">取消收藏</a><a href="/goodinfo/{{$row->id}}">商品详情<td>
              </tr>
              @endforeach
             </tbody>
            </table>
           </div>
          </div>
         </div>
         <!-- Single Tab Content End -->
         <!-- Single Tab Content Start -->

         <div class="tab-pane fade" id="download" role="tabpanel" style="width: 150%">
          <div class="myaccount-content" style="width: 150%">
           <div class="user-safety">
            <div class="am-cf am-padding">
              <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
            </div>
            <hr>
            <div class="check">
              <ul>
                <li>
                  <i class="i-safety-lock"></i>
                  <div class="m-left">
                    <div class="fore1">登录密码</div>
                    <div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
                  </div>
                  <div class="fore3">
                    <a href="/mypwdchange/{{session('hid')}}">
                      <div class="am-btn am-btn-secondary">修改</div>
                    </a>
                  </div>
                </li>
                <li>
                  <i class="i-safety-wallet"></i>
                  <div class="m-left">
                    <div class="fore1">支付密码</div>
                    <div class="fore2"><small>启用支付密码功能，为您资产账户安全加把锁。</small></div>
                  </div>
                  <div class="fore3">
                    <a href="#">
                      <div class="am-btn am-btn-secondary">立即启用</div>
                    </a>
                  </div>
                </li>
                <li>
                  <i class="i-safety-iphone"></i>
                  <div class="m-left">
                    <div class="fore1">手机验证</div>
                    <div class="fore2"><small>您验证的手机：186XXXXXXXX 若已丢失或停用，请立即更换</small></div>
                  </div>
                  <div class="fore3">
                    <a href="bindphone.html">
                      <div class="am-btn am-btn-secondary">换绑</div>
                    </a>
                  </div>
                </li>
                <li>
                  <i class="i-safety-mail"></i>
                  <div class="m-left">
                    <div class="fore1">邮箱验证</div>
                    <div class="fore2"><small>您验证的邮箱：5831XXX@qq.com 可用于快速找回登录密码</small></div>
                  </div>
                  <div class="fore3">
                    <a href="/hlogin/{{session('hid')}}">
                      <div class="am-btn am-btn-secondary">换绑</div>
                    </a>
                  </div>
                </li>
                <li>
                  <i class="i-safety-idcard"></i>
                  <div class="m-left">
                    <div class="fore1">实名认证</div>
                    <div class="fore2"><small>用于提升账号的安全性和信任级别，认证后不能修改认证信息。</small></div>
                  </div>
                  <div class="fore3">
                    <a href="idcard.html">
                      <div class="am-btn am-btn-secondary">认证</div>
                    </a>
                  </div>
                </li>
                <li>
                  <i class="i-safety-security"></i>
                  <div class="m-left">
                    <div class="fore1">安全问题</div>
                    <div class="fore2"><small>保护账户安全，验证您身份的工具之一。</small></div>
                  </div>
                  <div class="fore3">
                    <a href="question.html">
                      <div class="am-btn am-btn-secondary">认证</div>
                    </a>
                  </div>
                </li>
              </ul>
            </div>

          </div>
          </div>
         </div>
         <!-- Single Tab Content End -->
         <!-- Single Tab Content Start -->
         <!-- 强改的 -->
         <div class="tab-pane fade" id="payment-method" role="tabpanel">
          <div class="myaccount-content">
           <div class="user-coupon">
            <!--标题 -->
            <div class="am-cf am-padding">
              <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">优惠券</strong> / <small>Coupon</small></div>
            </div>
            <hr>

            <div class="am-tabs-d2 am-tabs  am-margin" data-am-tabs="">

              <ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
                <li class="am-active"><a href="#tab1">可用优惠券</a></li>
                <li><a href="#tab2">已用/过期优惠券</a></li>

              </ul>

              <div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                <!-- 这里是可使用的优惠券 -->
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                  <div class="coupon-items">
                    <!-- 这里开始遍历 -->
                    @if($Log == '')
                         <div class="coupon-item coupon-item-d">
                            <p>暂无优惠券,快去领券</p>
                         </div>
                    @else

                    @foreach($Log as $rr)

                      @if(($rr->status) == 1 )
                    <div class="coupon-item coupon-item-d">
                      <div class="coupon-list">
                        <div class="c-type">
                          <div class="c-class">
                            <strong>购物券</strong>
                          </div>
                          <div class="c-price">
                            <strong>￥{{$rr->minus}}</strong>
                          </div>
                          <div class="c-limit">
                            【消费满&nbsp;{{$rr->max}}元&nbsp;可用】
                          </div>
                          <div class="c-time"><span>使用期限</span>{{$rr->start_time}}~~{{$rr->end_time}}</div>
                          <div class="c-type-top"></div>

                          <div class="c-type-bottom"></div>
                        </div>

                        <div class="c-msg">
                          <div class="c-range">
                            <div class="range-all">
                              <div class="range-item">
                                <span class="label">券&nbsp;编&nbsp;号：</span>
                                <span class="txt">{{$rr->did}}</span>
                              </div>
                            </div>
                          </div>
                          <div class="op-btns">
                            <a href="/search/{{$rr->cid}}" class="btn"><span class="txt">立即使用</span><b></b></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  @endif
                    <!-- 这里结束 -->

                  </div>

                </div>
                <!-- 这里是已使用和过期的优惠券 -->
                <div class="am-tab-panel am-fade" id="tab2">
                  <div class="coupon-items">
                <!-- 开始遍历 -->
                @if($Log == '')
                      <div class="coupon-item coupon-item-yf">
                      <div class="coupon-list">
                        <div class="c-type">
                          <div class="c-class">
                            <strong>暂无数据</strong>
                            <span class="am-icon-trash"></span>
                          </div>
                          <div class="c-price">
                            <strong></strong>
                          </div>
                          <div class="c-limit">

                          </div>
                          <div class="c-time"><span></span></div>
                          <div class="c-type-top"></div>

                          <div class="c-type-bottom"></div>
                        </div>

                        <div class="c-msg">
                          <div class="c-range">
                            <div class="range-all">
                              <div class="range-item">
                                <span class="label"></span>
                                <span class="txt"></span>
                              </div>
                            </div>

                          </div>
                          <div class="op-btns c-del">

                          </div>
                        </div>

                        <li class="td td-usestatus ">
                          <div class="item-usestatus ">
                            </div>
                        </li>
                      </div>
                    </div>
                @else
                @foreach($Log as $rrs)
                  @if( $rrs->status != 1 )
                    <div class="coupon-item coupon-item-yf">
                      <div class="coupon-list">
                        <div class="c-type">
                          <div class="c-class">
                            <strong>优惠券</strong>
                            <span class="am-icon-trash"></span>
                          </div>
                          <div class="c-price">
                            <strong>￥{{$rrs->minus}}</strong>
                          </div>
                          <div class="c-limit">
                            【消费满&nbsp;{{$rrs->max}}元&nbsp;可用】
                          </div>
                          <div class="c-time"><span>使用期限</span>{{$rrs->start_time}}~~{{$rrs->end_time}}</div>
                          <div class="c-type-top"></div>

                          <div class="c-type-bottom"></div>
                        </div>

                        <div class="c-msg">
                          <div class="c-range">
                            <div class="range-all">
                              <div class="range-item">
                                <span class="label">券&nbsp;编&nbsp;号：</span>
                                <span class="txt">{{$rrs->did}}</span>
                              </div>
                            </div>

                          </div>
                          <div class="op-btns c-del">
                            <span class="txt"></span><b></b>
                          </div>
                        </div>

                        <li class="td td-usestatus ">
                          <div class="item-usestatus ">
                            </div>
                        </li>
                      </div>
                    </div>


                    @endif
                    @endforeach
                    @endif
                    <!-- 结束 -->
                  </div>

                </div>
              </div>

            </div>

          </div>
          </div>
         </div>
         <!-- Single Tab Content End -->
         <!-- Single Tab Content Start -->
         <div class="tab-pane fade" id="address-edit" role="tabpanel">
          <div class="myaccount-content">
           <h3>地址管理</h3>
           <address> <p><strong>亲爱你您</strong></p> <p>请您移步到下面的管理地址那里查看你所有添加的地址 <br />如果疑问请联系客服</p> <p>爱你哟（づ￣3￣）づ╭❤～</p> </address>
           <a href="/haddress/{{session('hid')}}" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>管理地址</a>
             <a href="/haddaddress" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>添加地址</a>
          <!-- <button class="save-change-btn" data-toggle="modal" data-target="#mymodal">添加收货地址</button> -->

          </div>
         </div>
         <!-- 强改完 -->

         <!-- Single Tab Content End -->
         <!-- Single Tab Content Start -->
         <div class="tab-pane fade" id="account-info" role="tabpanel">
          <div class="myaccount-content">
            <h3>账户详情</h3>
           <div class="account-details-form">
            @if($user == '')
                
                  <a style="text-align: center;" href="/huserinfo/{{$uid}}" class="save-change-btn">填写个人资料</a>
                
            @else
            <form action="/hupuser" method="post">
              {{csrf_field()}}
             <div class="row">
              <div class="col-12 mb-30">
                姓名：
               <input id="display-name" placeholder="Name" type="text" name="username" value="{{$user->username}}" />
              </div>
              <div class="col-12 mb-30">
                年龄：
               <input id="age" placeholder="Age" type="text" name="age" value="{{$user->age}}" />
              </div>
              <input type="hidden" name="uid" value="{{$user->uid}}">
              <div class="col-12 mb-30">
                性别：
               <label class="am-radio-inline">
                      <input type="radio" name="sex" value="0" {{$user->sex==0?'checked':''}}  > 女
                    </label>
                    <label class="am-radio-inline">
                      <input type="radio" name="sex" value="1" {{$user->sex==1?'checked':''}}  > 男
                    </label>
                    <label class="am-radio-inline">
                      <input type="radio" name="sex" value="2" {{$user->sex==2?'checked':''}}  > 保密
                    </label>
              </div>
              <div class="col-12 mb-30">
                邮箱：
               <input id="email" placeholder="Email Address" type="email" name="email" value="{{$user->email}}" />
              </div>
              <div class="col-12 mb-30">
                电话：
               <input id="phone" placeholder="Phone" type="tel" name="phone" value="{{$user->phone}}" />
              </div>
              <div class="col-12 mb-30">
                家庭地址：
               <input id="address" placeholder="Address" type="text" name="address" value="{{$user->address}}" />
              </div>
              <div class="col-12">
               <button class="save-change-btn">保存</button>
              </div>
             </div>
            </form>
           
            @endif
           </div>
          </div>
         </div>



          <div class="tab-pane fade" id="announce" role="tabpanel">
          <div class="myaccount-content">
           <h3>消息</h3>
            @foreach($notice as $r)
            <div class="row"> 
               <div class="col-lg-12"> 
                <div class="faq-wrapper"> 
                 <div id="accordion">                           
                  <div class="card"> 
                   <div class="card-header" id="headingSix"> 
                    <h5 class="mb-0"> <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">{{$r->created_at}}<span> <i class="fa fa-chevron-down"></i> <i class="fa fa-chevron-up"></i> </span> </button> </h5> 
                   </div> 
                   <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion"> 
                    <div class="card-body"> 
                     <a href="/mypersonal/{{$r->id}}" style="text-transform: 30">{{$r->title}}</a>
                    </div> 
                   </div> 
                  </div> 
                 </div> 
                </div> 
               </div> 
              </div>
            @endforeach


          </div>
         </div>




         <!-- Single Tab Content End -->
        </div>
       </div>
       <!-- My Account Tab Content End -->
      </div>
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of My Account page content  ======-->
 </body>
 <script type="text/javascript">
 $(".d").bind('click',function(){
 //console.log(2);


  id=$(this).attr('gid');
 
  s=$(this).parents("tr");
  //alert(s);
  //console.log(id);
   $.ajax({
      url: '/cogoods',
      data: {id:id},

      // dataType: 'json',
      success: function(data){
        console.log(typeof data);
        // 返回的是字符串，就是因为加了两行空行
        data = data.replace(/\s/g, '');
        var ob = JSON.parse(data);
        console.log(ob);

        if(ob.msg==0){
          alert('已取消收藏');
          s.remove();
        }else if(ob.msg==1){
          alert('取消收藏失败');
         

         
        }

        
      },
      error: function(res) {
        console.log('res');
      }
    });

});


</script>
</html>
@endsection
@section('title','灯饰人生')
