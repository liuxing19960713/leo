@extends("Home.HomePublic.publics")
@section('home')
  <!--=============================================
    =            Breadcrumb Area         =
    =============================================-->
<html>
 <head></head>
 <script src="/static/jquery-1.7.2.min.js"></script>
  <link rel="stylesheet" href="cbootstrap.min.css">
  <script src="/static/public/js/jquery.min.js"></script>
  <script src="/static/public/js/bootstrap.min.js"></script>
  <script src="/static/public/js/holder.min.js"></script>
  <link href="/static/public/css/admin.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/amazeui.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/personal.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/cpstyle.css" rel="stylesheet" type="text/css">
  <link href="/static/public/css/infstyle.css" rel="stylesheet" type="text/css">   
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
           <h3>订单</h3>
           <div class="myaccount-table table-responsive text-center">
            <table class="table table-bordered">
             <thead class="thead-light">
              <tr>
               <th>No</th>
               <th>Name</th>
               <th>Date</th>
               <th>Status</th>
               <th>Total</th>
               <th>Action</th>
              </tr>
             </thead>
             <tbody>
              <tr>
               <td>1</td>
               <td>Mostarizing Oil</td>
               <td>Aug 22, 2018</td>
               <td>Pending</td>
               <td>$45</td>
               <td><a href="cart.html" class="btn">View</a></td>
              </tr>
              <tr>
               <td>2</td>
               <td>Katopeno Altuni</td>
               <td>July 22, 2018</td>
               <td>Approved</td>
               <td>$100</td>
               <td><a href="cart.html" class="btn">View</a></td>
              </tr>
              <tr>
               <td>3</td>
               <td>Murikhete Paris</td>
               <td>June 12, 2017</td>
               <td>On Hold</td>
               <td>$99</td>
               <td><a href="cart.html" class="btn">View</a></td>
              </tr>
             </tbody>
            </table>
           </div>
          </div>
         </div>
         <!-- Single Tab Content End -->
         <!-- Single Tab Content Start -->
         <div class="tab-pane fade" id="download" role="tabpanel">
          <div class="myaccount-content">
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
                    <a href="password.html">
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
                    <a href="setpay.html">
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
                            <strong>运费券</strong>
                          </div>
                          <div class="c-price">
                            <strong>可抵运费</strong>
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
                            <strong>运费券</strong>
                            <span class="am-icon-trash"></span>
                          </div>
                          <div class="c-price">
                            <strong>可抵运费</strong>
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
            <form action="#">
             <div class="row">
              <div class="col-lg-6 col-12 mb-30">
               <input id="first-name" placeholder="First Name" type="text" />
              </div>
              <div class="col-lg-6 col-12 mb-30">
               <input id="last-name" placeholder="Last Name" type="text" />
              </div>
              <div class="col-12 mb-30">
               <input id="display-name" placeholder="Display Name" type="text" />
              </div>
              <div class="col-12 mb-30">
               <input id="email" placeholder="Email Address" type="email" />
              </div>
              <div class="col-12 mb-30">
               <h4>Password change</h4>
              </div>
              <div class="col-12 mb-30">
               <input id="current-pwd" placeholder="Current Password" type="password" />
              </div>
              <div class="col-lg-6 col-12 mb-30">
               <input id="new-pwd" placeholder="New Password" type="password" />
              </div>
              <div class="col-lg-6 col-12 mb-30">
               <input id="confirm-pwd" placeholder="Confirm Password" type="password" />
              </div>
              <div class="col-12">
               <button class="save-change-btn">Save Changes</button>
              </div>
             </div>
            </form>
           </div>
          </div>
         </div>



          <div class="tab-pane fade" id="announce" role="tabpanel">
          <div class="myaccount-content">
           <h3>消息</h3>
           <div class="account-details-form">
            ss
           </div>
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
</script>
</html>
@endsection
@section('title','灯饰人生')