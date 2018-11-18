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
         <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> 下载</a>
         <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> 付款方式</a>
         <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> 地址</a>
         <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> 账户详细资料</a>
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
           <h3>下载</h3>
           <div class="myaccount-table table-responsive text-center">
            <table class="table table-bordered">
             <thead class="thead-light">
              <tr>
               <th>Product</th>
               <th>Date</th>
               <th>Expire</th>
               <th>Download</th>
              </tr>
             </thead>
             <tbody>
              <tr>
               <td>Mostarizing Oil</td>
               <td>Aug 22, 2018</td>
               <td>Yes</td>
               <td><a href="#" class="btn">Download File</a></td>
              </tr>
              <tr>
               <td>Katopeno Altuni</td>
               <td>Sep 12, 2018</td>
               <td>Never</td>
               <td><a href="#" class="btn">Download File</a></td>
              </tr>
             </tbody>
            </table>
           </div>
          </div>
         </div>
         <!-- Single Tab Content End -->
         <!-- Single Tab Content Start -->
         <div class="tab-pane fade" id="payment-method" role="tabpanel">
          <div class="myaccount-content">
           <h3>付款方式</h3>
           <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
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
                <form action="/addadress">
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
 <script>
//第一级别获取
    
       $.get("/adress",{upid:0},function(result)
      {
          // console.log(result);
          // alert(result);
        //禁止被选中
        $('.ss').attr('disabled','true');

        //得到的数据数组内容  我们要遍历得到里面的每一个对象
        for(var i=0;i<result.length;i++)
        {

          //将我们得到的地址名称写在Option标签中
          var info=$('<option value="'+result[i].id+'">'+result[i].name+'</option>');
          // console.log(i.name);
          //将得到的option标签放入到select对象中
          $('#sid').append(info);
        }
      });

 

  //其他级别内容
  //live 事件委派 他可以帮助我们将动态生成的内容只要选择器相同就可以有相应的事件
  $('select').live('change',function()
  {
    //将当前的对象存储起来
    obj=$(this);
    //通过id来查找下一个
    id=$(this).val();

    //清除所有其他的select
    obj.nextAll('select').remove();

    $.getJSON('/addadress',{upid:id},function(result)
    {
      if(result!='')
      {
        //创建一个select标签对象
        var select=$('<select></select>');
        //防止当前城市没有办法选择所以我们先写上一个请选择option标签
        var op=$('<option class"mm">--请选择--</option>');
        select.append(op);
        //循环的到的数组里面的option标签添加到select
        for(var i=0;i<result.length;i++)
        {
          var info=$('<option value="'+result[i].id+'">'+result[i].name+'</option>');
          //将option标签添加到select标签中
          select.append(info);
        }
        //将select标签添加到当前标签后面
        obj.after(select);
        //把其他级别的请选择禁用
        $('.mm').attr('disabled','true');
      }
    })

  })
  //获取选中的数据提交到操作页面
  $('button').click(function()
  {
    arr=[];
    console.log($('select'));
    $('select').each(function()
    {
      //获取当前select被选中的option标签里面的中文文本
      opdata=$(this).find('option:selected').html();
      //将我们的到的每个值放置到数组中  push()将数值添加到数组中
      arr.push(opdata);
    })
    //将得到的数组值直接赋值给隐藏域的value值即可
    $('input[name=city]').val(arr);
  })

</script>
</html>
@endsection
@section('title','灯饰人生')
