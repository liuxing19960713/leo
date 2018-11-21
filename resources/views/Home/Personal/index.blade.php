@extends("Home.HomePublic.publics")
@section('home')
  <!--=============================================
    =            Breadcrumb Area         =
    =============================================-->
<html>
 <head></head>
 <script src="/static/jquery-1.7.2.min.js"></script>
  <link rel="stylesheet" href="/static/public/css/bootstrap.min.css">
  <script src="/static/public/js/jquery.min.js"></script>
  <script src="/static/public/js/bootstrap.min.js"></script>
  <script src="/static/public/js/holder.min.js"></script>
  <link href="/static/public/css/admin.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/amazeui.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/personal.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/cpstyle.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/infstyle.css" rel="stylesheet" type="text/css">
  
  <link href="/static/public/css/orstyle.css" rel="stylesheet" type="text/css">

  <script src="/static/public/jquery.min.js"></script>
  <script src="/static/public/js/amazeui.js"></script>

 <body>
  <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <div class="breadcrumb-container">
       <ul>
        <li><a href="/">主页</a> <span class="separator">/</span></li>
        <li class="active">我的账户</li>
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
         <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> 收藏</a>
         <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> 付款方式</a>
         <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> 地址</a>
         <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> 账户详细资料</a>


        <a href="#announce" data-toggle="tab"><i class="glyphicon glyphicon-bullhorn"></i>消息<span class="count">({{$count}})</span></a>

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
            <p>你好, <strong>{{session('name')}}</strong> (如果不是 <strong>Tuntuni !</strong><a href="/hlogin/loginout/{{session('id')}}" class="logout"> 退出</a>)</p>
           </div>
           <p class="mb-0">来自您的帐户信息中心。您可以轻松查看和查看最近的订单,管理您的送货和帐单地址，以及修改密码和帐户详细信息。</p>
          </div>
         </div>
         <!-- Single Tab Content End -->
         <!-- Single Tab Content Start -->
         <div class="tab-pane fade" id="orders" role="tabpanel">
          <div class="myaccount-content">
           <h3>订单</h3>


            
            <!-- 订单开始 -->
            <div class="user-order"> 
             <!--标题 --> 
             <div class="am-cf am-padding"> 
              <div class="am-fl am-cf">
               <strong class="am-text-danger am-text-lg">订单管理</strong> / 
               <small>Order</small>
              </div> 
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
                  {{var_dump($da->status)}}
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
                      <div class="item-amount">
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
                             <div class="am-btn am-btn-danger anniu">
                               确认收货
                             </div></li>

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
                      <div class="item-amount">
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
                      <div class="item-amount">
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
                      <div class="item-amount">
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
                      <div class="item-amount">
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
         </div>
         <!-- Single Tab Content End -->
         <!-- Single Tab Content Start -->
         <div class="tab-pane fade" id="download" role="tabpanel">
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
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                  <div class="coupon-items">
                    <div class="coupon-item coupon-item-d">
                      <div class="coupon-list">
                        <div class="c-type">
                          <div class="c-class">
                            <strong>购物券</strong>
                          </div>
                          <div class="c-price">
                            <strong>￥8</strong>
                          </div>
                          <div class="c-limit">
                            【消费满&nbsp;95元&nbsp;可用】
                          </div>
                          <div class="c-time"><span>使用期限</span>2015-12-21--2015-12-31</div>
                          <div class="c-type-top"></div>

                          <div class="c-type-bottom"></div>
                        </div>

                        <div class="c-msg">
                          <div class="c-range">
                            <div class="range-all">
                              <div class="range-item">
                                <span class="label">券&nbsp;编&nbsp;号：</span>
                                <span class="txt">35730144</span>
                              </div>
                            </div>
                          </div>
                          <div class="op-btns">
                            <a href="#" class="btn"><span class="txt">立即使用</span><b></b></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="coupon-item coupon-item-yf">
                      <div class="coupon-list">
                        <div class="c-type">
                          <div class="c-class">
                            <strong>优惠券</strong>
                          </div>
                          <div class="c-price">
                            <strong>可抵优惠券/strong>
                          </div>
                          <div class="c-limit">
                            【不含偏远地区】
                          </div>
                          <div class="c-time"><span>使用期限</span>2015-12-21--2015-12-31</div>
                          <div class="c-type-top"></div>

                          <div class="c-type-bottom"></div>
                        </div>

                        <div class="c-msg">
                          <div class="c-range">
                            <div class="range-all">
                              <div class="range-item">
                                <span class="label">券&nbsp;编&nbsp;号：</span>
                                <span class="txt">35728267</span>
                              </div>
                            </div>

                          </div>
                          <div class="op-btns">
                            <a href="#" class="btn"><span class="txt">立即使用</span><b></b></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="am-tab-panel am-fade" id="tab2">
                  <div class="coupon-items">
                    <div class="coupon-item coupon-item-d">
                      <div class="coupon-list">
                        <div class="c-type">
                          <div class="c-class">
                            <strong>购物券</strong>
                            <span class="am-icon-trash"></span>
                          </div>
                          <div class="c-price">
                            <strong>￥8</strong>
                          </div>
                          <div class="c-limit">
                            【消费满&nbsp;95元&nbsp;可用】
                          </div>
                          <div class="c-time"><span>使用期限</span>2015-12-21--2015-12-31</div>
                          <div class="c-type-top"></div>

                          <div class="c-type-bottom"></div>
                        </div>

                        <div class="c-msg">
                          <div class="c-range">
                            <div class="range-all">
                              <div class="range-item">
                                <span class="label">券&nbsp;编&nbsp;号：</span>
                                <span class="txt">35730144</span>
                              </div>
                            </div>
                          </div>
                          <div class="op-btns c-del">
                            <a href="#" class="btn"><span class="txt">删除</span><b></b></a>
                          </div>
                        </div>
                        
                        <li class="td td-usestatus ">
                          <div class="item-usestatus ">
                            <span><img src="../images/gift_stamp_31.png" <="" span="">
                          </span></div>
                        </li>                       
                      </div>
                    </div>
                    <div class="coupon-item coupon-item-yf">
                      <div class="coupon-list">
                        <div class="c-type">
                          <div class="c-class">
                            <strong>优惠券</strong>
                            <span class="am-icon-trash"></span>
                          </div>
                          <div class="c-price">
                            <strong>可抵优惠券/strong>
                          </div>
                          <div class="c-limit">
                            【不含偏远地区】
                          </div>
                          <div class="c-time"><span>使用期限</span>2015-12-21--2015-12-31</div>
                          <div class="c-type-top"></div>

                          <div class="c-type-bottom"></div>
                        </div>

                        <div class="c-msg">
                          <div class="c-range">
                            <div class="range-all">
                              <div class="range-item">
                                <span class="label">券&nbsp;编&nbsp;号：</span>
                                <span class="txt">35728267</span>
                              </div>
                            </div>

                          </div>
                          <div class="op-btns c-del">
                            <a href="#" class="btn"><span class="txt">删除</span><b></b></a>
                          </div>
                        </div>
                        
                        <li class="td td-usestatus ">
                          <div class="item-usestatus ">
                            <span><img src="../images/gift_stamp_21.png" <="" span="">
                          </span></div>
                        </li>
                      </div>
                    </div>
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
           <address> <p><strong>Alex Tuntuni</strong></p> <p>1355 Market St, Suite 900 <br /> San Francisco, CA 94103</p> <p>Mobile: (123) 456-7890</p> </address>
           <a href="#" class="btn d-inline-block edit-address-btn"><i class="fa fa-edit"></i>Edit Address</a>
           <button class="save-change-btn" data-toggle="modal" data-target="#mymodal">添加收货地址</button>
            <div class="modal fade" id="mymodal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <!-- 这是模态框的头 -->
                  <div class="modal-header">
                  <!-- 关闭modal框的 data-dismiss -->
                    <h3>添加收货地址</h3>
                    </div>
                  <div class="modal-body">
                <form action="">
                  <div class="am-form-group-8">
                      <label for="user-name" class="am-form-label">收货人：</label>
                        <input type="text" id="user-name" name="name" placeholder="收货人" size="22">
                    </div>
                  <div class="am-form-group">
                      <label for="phone" class="am-form-label">联系电话：</label>
                        <input type="tel" id="pgone" name="phone" placeholder="手机号必填">
                    </div>
                 <div class="form-group">
                   <font color="red"></font>联系地址: <select id="sid">
                    <option value="" class="ss" >--请选择--</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <input type="hidden" name="city">
                  </div>
                  <div class="am-form-group">
                      <label for="address" class="am-form-label">详细地址：</label>
                        <input type="text" id="pgone" name="address" placeholder="请输入详细地址" size="40">
                    </div>
              <div class="form-group">
                  <button type="submit" class="save-change-btn" >保存</button>
                </div>
                </form>
              </div>
            <div class="modal-footer">
                    <button class="save-change-btn" data-dismiss="modal">关闭</button>
                  </div>
                </div>

              </div>
            </div>
          </div>
         </div>
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
              {{$notice->render()}}

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
    // 第一级别获取
    $.get('/city',{upid:0},function(data){
      // console.log(data);
      // 禁止请选择选中
      $('.ss').attr('disabled','true');
      // 得到的数据数组内容 遍历每一个对象
      for(var i=0;i<data.length;i++){
        // 将我们遍历得到的地址写在option标签中
        var info = $('<option value="'+data[i].id+'">'+data[i].name+'</option>');
        // 将得到的option标签放入到select对象中
        $('#sid').append(info);
      }
    },'json');
    // 其他级别内容
    //live 事件委派 他可以帮助我们将动态生成的内容只要选择器相同就可以有相应的事件
    $('select').live('change',function(){
        // 将当前的对象存储起来
        obj = $(this);
        // 通过ID查找下一个
        id = $(this).val();
        // 清除所有其他的select
        obj.nextAll('select').remove();
        // alert(id);
        $.getJSON('/city',{upid:id},function(data){
            // alert(data);
            if(data !=''){
                // 创建一个select标签
                var select = $('<select></select>');
                //防止当前城市没有办法选择所以我们先写上一个请选择option标签
                var op = $('<option value="" class="mm">--请选择--</option>');
                select.append(op);
                // 循环得到的数组里面的option标签添加到selete
                for(var i=0;i<data.length;i++){
                    var info = $('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                    select.append(info);
                }
                // 将select标签添加到当前标签后面
                obj.after(select);
                // 把其他级别的请选择禁用
                $('.mm').attr('disabled','true');
            }
        })
    });
    // 获取选中的数据提交操作页面
    $('button').click(function(){
        arr = [];
        $('select').each(function(){
            // 获取 当前select被选中的option标签文本
            opdata = $(this).find('option:selected').html();
            // 将我们得到的每个值放置到数组中 push()
            arr.push(opdata);
        })
        //将得到的数组直接赋值给隐藏域的value值即可
        $('input[name=city]').val(arr);

    })
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