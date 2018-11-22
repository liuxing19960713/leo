@extends("Home.HomePublic.publics")
@section('home')

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

    <title>订单详情</title>

    <link href="/static/home/order_info/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
    <link href="/static/home/order_info/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

    <link href="/static/home/order_info/css/personal.css" rel="stylesheet" type="text/css">
    <link href="/static/home/order_info/css/orstyle.css" rel="stylesheet" type="text/css">

    <script src="/static/home/order_info/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
    <script src="/static/home/order_info/AmazeUI-2.4.2/assets/js/amazeui.js"></script>


  </head>

  <body>
   
    <div class="center" style="padding-top: 250px">
      <div class="col-main">
        <div class="main-wrap">

          <div class="user-orderinfo">

            <!--标题 -->
            <div class="am-cf am-padding">
              <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
            </div>
            <hr/>
            <!--进度条-->
            <div class="m-progress">
          
            <div class="order-infoaside">
              <div class="order-logistics">
                <i>
                  <div class="icon-log">
                   
                  </div>
                   @if(!empty($infos->endtime))
                  <div class="latest-logistics">
                    <p class="text">已签收,签收人是{{$infos->linkname}}签收，感谢使用天天快递，期待再次为您服务</p>
                    <div class="time-list">
                      <i><img src="/static/home/order_info/images/receive.png"></i>
                      <span class="date">{{date('Y-m-d H:i:s',$infos->endtime)}} </span>
                    </div>
                    @endif
                      @if($infos->status==2)
                          <div class="m-progress-list">
                <span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">拍下商品</p>
                                </span>
                <span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                   <p class="stage-name">卖家发货</p>
                                </span>
                <span class="step-3 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">3<em class="bg"></em></i>
                                   <p class="stage-name">确认收货</p>
                                </span>
                <span class="step-4 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">4<em class="bg"></em></i>
                                   <p class="stage-name">交易完成</p>
                                </span>
                <span class="u-progress-placeholder"></span>
              </div>
              <div class="u-progress-bar total-steps-2">
                <div class="u-progress-bar-inner"></div>
              </div>
            </div>

                    <div class="inquire">
                      <span class="package-detail">物流：天天快递</span>
                      <span class="package-detail">快递单号: </span>
                      <span class="package-number">{{$infos->order_code}}</span>
                      <a href="/logistics/{{$infos->oid}}">查看物流</a>
                      @else
                      等待商家发货
                      @endif
                    </div>
                  </div>
                  <span class="am-icon-angle-right icon"></span>
                </i>
                <div class="clear"></div>
              </div>
              <div class="order-addresslist">
                <div class="order-address">
                  <div class="icon-add">
                  </div>
                  <p class="new-tit new-p-re">
                    <span class="new-txt">{{$infos->linkname}}</span>
                    <span class="new-txt-rd2">{{$infos->tel}}</span>
                  </p>
                  <div class="new-mu_l2a new-p-re">
                    <p class="new-mu_l2cw">
                      <span class="street">{{$infos->address}}</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="order-infomain">

              <div class="order-top">
                <div class="th th-item">
                  <td class="td-inner">商品</td>
                </div>
                <div class="th th-price">
                  <td class="td-inner">单价</td>
                </div>
                <div class="th th-number">
                  <td class="td-inner">数量</td>
                </div>
                <div class="th th-operation">
                  <td class="td-inner">商品操作</td>
                </div>
                <div class="th th-amount">
                  <td class="td-inner">合计</td>
                </div>
                <div class="th th-status">
                  <td class="td-inner">交易状态</td>
                </div>
                <div class="th th-change">
                  <td class="td-inner">交易操作</td>
                </div>
              </div>

              <div class="order-main">

                <div class="order-status3">
                  <div class="order-title">
                    <div class="dd-num">订单编号：<a href="javascript:;">{{$infos->order_code}}</a></div>
                    <span>成交时间：{{date('Y-m-d H:i:s',$infos->addtime)}}</span>
                    <!--    <em>店铺：小桔灯</em>-->
                  </div>
                  <div class="order-content">
                    <div class="order-left">
                   

                      <ul class="item-list">
                        <li class="td td-item">
                          <div class="item-pic">
                            <a href="#" class="J_MakePoint">
                              <img src="/static/admin/uploads/z_goods/{{$infos->pic}}" class="itempic J_ItemImg">
                            </a>
                          </div>
                          
                        </li>
                        <li class="td td-price">
                          <div class="item-price">
                            {{$infos->price}}
                          </div>
                        </li>
                        <li class="td td-number">
                          <div class="item-number">
                            <span>×</span>{{$infos->onum}}
                          </div>
                        </li>
                        <li class="td td-operation">
                          <div class="item-operation">
                            退款/退货
                          </div>
                        </li>
                      </ul>

                    </div>
                    <div class="order-right">
                      <li class="td td-amount">
                        <div class="item-amount">
                          合计：{{$infos->total}}
                          <p>优惠金额：<span>{{$infos->minus}}</span></p>
                        </div>
                      </li>
                       @if($infos->status==2)
                      <div class="move-right">
                        <li class="td td-status">
                          <div class="item-status">
                            
                            <p class="Mystatus">卖家已发货</p>
                           
                            <p class="order-info"><a href="/logistics/{{$infos->oid}}">查看物流</a></p>
                            <p class="order-info"><a href="#">延长收货</a></p>
                          </div>
                        </li>
                        <li class="td td-change">
                          <div class="am-btn am-btn-danger anniu">
                            确认收货</div>

                        </li>
                        @elseif($infos->status == 4)
                         <li class="td td-change">
                              <div class="am-btn anniu tixing ">
                            订单完成</div>

                        </li>
                          @elseif($infos->status== 1)
                            <li class="td td-change">
                              <div class="am-btn am-btn-danger anniu tixing fahuo">
                            提醒商家发货</div>

                        </li>
                      </div>
                      @endif

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
     
    </div>

  </body>

  <script>
    $('.tixing').click(function(){
      $('.fahuo').removeClass('am-btn am-btn-danger anniu tixing fahuo');
      $('.fahuo').removeClass('fahuo');
    })
  </script>
</html>

@endsection
@section('title','灯饰人生')