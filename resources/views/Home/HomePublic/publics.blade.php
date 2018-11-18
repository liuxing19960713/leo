<!DOCTYPE html>
<html class="no-js" lang="zxx">
 <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>@yield('title')</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Favicon -->
  <link rel="icon" href="/static/home/assets/images/favicon.ico" />
  <!-- CSS
  ============================================ -->
  <!-- Bootstrap CSS -->
  <link href="/static/home/assets/css/bootstrap.min.css" rel="stylesheet" />
  <!-- FontAwesome CSS -->
  <link href="/static/home/assets/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Linear Icon CSS -->
  <link href="/static/home/assets/css/linear-icon.css" rel="stylesheet" />
  <!-- Plugins CSS -->
  <link href="/static/home/assets/css/plugins.css" rel="stylesheet" />
  <!-- Helper CSS -->
  <link href="/static/home/assets/css/helper.css" rel="stylesheet" />
  <!-- Main CSS -->
  <link href="/static/home/assets/css/main.css" rel="stylesheet" />
  <!-- Modernizer JS -->
  <script src="/static/home/assets/js/vendor/modernizr-2.8.3.min.js"></script>
   <script src="/static/js/jquery-1.8.3.min.js"></script>
 </head>
 <body>
  <!--=============================================
  =            Header One         =
  =============================================-->
  <div class="header-container header-sticky">
   <!--=======  header top  =======-->
   <div class="header-top pt-15 pb-15">
    <div class="container">
     <div class="row">
      <div class="col-12 col-md-6 text-center text-md-left mb-sm-15">
       <span class="header-top-text">欢迎来到灯饰人生网上商店！</span>
      </div>
      <div class="col-12 col-md-6">
       <!--=======  header top dropdowns  =======-->
       <div class="header-top-dropdown d-flex justify-content-center justify-content-md-end">
        <!--=======  single dropdown  =======-->
        <div class="single-dropdown">
          <span id="accountMenuName">
          @if(null !== (session('username')))
        欢迎{{session('username')}}</span>&nbsp;&nbsp;
          @endif
         |&nbsp;&nbsp;<a href="#" id="changeAccount"><span id="accountMenuName">我的账户<i class="fa fa-angle-down"></i></span></a>
         <div class="language-currency-list hidden" id="accountList">
          <ul>
            @if(null !== (session('username')))
           <li><a href="/mypersonal">我的账户</a></li>
           <li><a href="checkout.html">结算</a></li>
           <li><a href="/hlogin/loginout/{{session('id')}}">登出</a></li>
            @else
           <li><a href="/hlogin/create">登录</a></li>
           <li><a href="/hregi/create">注册</a></li>
            @endif
          </ul>
         </div>
        </div>

        <!--=======  End of single dropdown  =======-->
        <!--=======  single dropdown  =======-->


        <!--=======  End of single dropdown  =======-->
        <!--=======  single dropdown  =======-->
        <div class="single-dropdown">


        </div>
        <!--=======  End of single dropdown  =======-->
       </div>
       <!--=======  End of header top dropdowns  =======-->
      </div>
     </div>
    </div>
   </div>
   <!--=======  End of header top  =======-->
   <!--=======  Menu Top  =======-->
   <div class="menu-top pt-35 pb-35 pt-sm-20 pb-sm-20">
    <div class="container">
     <div class="row align-items-center">
      <div class="col-12 col-lg-3 col-md-3 text-center text-md-left mb-sm-20">
       <!--=======  logo  =======-->
       <div class="logo">
        <a href="index.html"> <img src="/static/home/assets/images/logo.png" class="img-fluid" alt="" /> </a>
       </div>
       <!--=======  End of logo  =======-->
      </div>
      <div class="col-12 col-lg-6 col-md-5 mb-sm-20">
       <!--=======  Search bar  =======-->
       <form action="index.html">
        <div class="search-bar">
         <input type="search" placeholder="Search entire store here ..." />
         <button><i class="lnr lnr-magnifier"></i></button>
        </div>
       </form>
       <!--=======  End of Search bar  =======-->
      </div>
      <div class="col-12 col-lg-3 col-md-4">
       <!--=======  menu top icons  =======-->
       <div class="menu-top-icons d-flex justify-content-center align-items-center justify-content-md-end">
        <!--=======  single icon  =======-->
        <div class="single-icon mr-20">
         <a href="wishlist.html"> <i class="lnr lnr-heart"></i> <span class="text">愿望清单</span> <span class="count">0</span> </a>
        </div>
        <!--=======  End of single icon  =======-->
        <!--=======  single icon  =======-->
        <div class="single-icon">
         <a href="javascript:void(0)" id="cart-icon"> <i class="lnr lnr-cart"></i> <span class="text">我的购物车</span> <span class="count">0</span> </a>
         <!-- cart floating box -->
         <div class="cart-floating-box hidden" id="cart-floating-box">
          <div class="cart-items">
           <div class="cart-float-single-item d-flex">
            <span class="remove-item" id="remove-item"><a href="#"><i class="fa fa-times"></i></a></span>
            <div class="cart-float-single-item-image">
             <a href="single-product.html"><img src="/static/home/assets/images/products/product01.jpg" class="img-fluid" alt="" /></a>
            </div>
            <div class="cart-float-single-item-desc">
             <p class="product-title"> <a href="single-product.html">Duis pulvinar obortis eleifend </a></p>
             <p class="price"><span class="quantity">1 x</span> $20.50</p>
            </div>
           </div>
           <div class="cart-float-single-item d-flex">
            <span class="remove-item"><a href="#"><i class="fa fa-times"></i></a></span>
            <div class="cart-float-single-item-image">
             <a href="single-product.html"><img src="/static/home/assets/images/products/product02.jpg" class="img-fluid" alt="" /></a>
            </div>
            <div class="cart-float-single-item-desc">
             <p class="product-title"> <a href="single-product.html">Fusce ultricies dolor vitae</a></p>
             <p class="price"><span class="quantity">1 x</span> $20.50</p>
            </div>
           </div>
          </div>
          <div class="cart-calculation">
           <div class="calculation-details">
            <p class="total">Subtotal <span>$22</span></p>
           </div>
           <div class="floating-cart-btn text-center">
            <a class="floating-cart-btn" href="checkout.html">Checkout</a>
            <a class="floating-cart-btn" href="cart.html">View Cart</a>
           </div>
          </div>
         </div>
         <!-- end of cart floating box -->
        </div>
        <!--=======  End of single icon  =======-->
       </div>
       <!--=======  End of menu top icons  =======-->
      </div>
     </div>
    </div>
   </div>
   <!--=======  End of Menu Top  =======-->
   <!--=======  navigation menu  =======-->
   <div class="navigation-menu">
    <div class="container">
     <div class="row">
      <div class="col-12 col-lg-3">
       <!--=======  category menu  =======-->
       <div class="hero-side-category">
        <!-- Category Toggle Wrap -->
        <div class="category-toggle-wrap">
         <!-- Category Toggle -->
         <button class="category-toggle"> <span class="lnr lnr-text-align-left"></span>全部商品分类<span class="lnr lnr-chevron-down"></span></button>
        </div>
        <!-- Category Menu -->
        <nav class="category-menu">
         <ul>
          @foreach($cate as $row)


          <li class="menu-item-has-children"><a href="/search/{{$row->id}}">{{$row->name}}</a>
          @if(count($row->dev)) 
           <!-- Mega Category Menu Start --> 
           <ul class="category-mega-menu">
            @foreach($row->dev as $rows) 
            <li class="menu-item-has-children"> <a class="megamenu-head" href="/search/{{$rows->id}}">{{$rows->name}}</a>
              @if(count($rows->dev)) 
             <ul>
                @foreach($rows->dev as $rowss) 
              <li><a href="/search/{{$rowss->id}}">{{$rowss->name}}</a></li> 

               @endforeach


             </ul>
              @endif
              </li>
              @endforeach


           </ul>
           @endif
           <!-- Mega Category Menu End --> </li>
           @endforeach
          <li><a href="#" id="more-btn"><span class="lnr lnr-plus-circle"></span> More Categories</a></li>

         </ul>

        </nav> 
       </div> 
       <!--=======  End of category menu =======--> 
      </div> 
      <div class="col-12 col-lg-9"> 
       <!-- navigation section --> 
       <div class="main-menu"> 
        <nav> 
         <ul> 
          <li class="active menu-item-has-children"><a href="#">HOME</a> 
           <ul class="sub-menu"> 
            <li><a href="index.html">Home Shop 1</a></li> 
            <li><a href="index-2.html">Home Shop 2</a></li> 
            <li><a href="index-3.html">Home Shop 3</a></li> 
            <li><a href="index-4.html">Home Shop 4</a></li> 
           </ul> </li> 
          <li class="menu-item-has-children"><a href="shop-left-sidebar.html">Shop</a> 
           <ul class="sub-menu"> 
            <li class="menu-item-has-children"><a href="shop-4-column.html">shop grid</a> 
             <ul class="sub-menu"> 
              <li><a href="shop-3-column.html">shop 3 column</a></li> 
              <li><a href="shop-4-column.html">shop 4 column</a></li> 
              <li><a href="shop-left-sidebar.html">shop left sidebar</a></li> 
              <li><a href="shop-right-sidebar.html">shop right sidebar</a></li> 
             </ul> </li> 
            <li class="menu-item-has-children"><a href="shop-list.html">shop List</a> 
             <ul class="sub-menu"> 
              <li><a href="shop-list.html">shop List</a></li> 
              <li><a href="shop-list-left-sidebar.html">shop List Left Sidebar</a></li> 
              <li><a href="shop-list-right-sidebar.html">shop List Right Sidebar</a></li> 
             </ul> </li> 
            <li class="menu-item-has-children"><a href="single-product.html">Single Product</a> 
             <ul class="sub-menu"> 
              <li><a href="single-product.html">Single Product</a></li> 
              <li><a href="single-product-variable.html">Single Product variable</a></li> 
              <li><a href="single-product-affiliate.html">Single Product affiliate</a></li> 
              <li><a href="single-product-group.html">Single Product group</a></li> 
              <li><a href="single-product-tabstyle-2.html">Tab Style 2</a></li> 
              <li><a href="single-product-tabstyle-3.html">Tab Style 3</a></li> 
              <li><a href="single-product-gallery-left.html">Gallery Left</a></li> 
              <li><a href="single-product-gallery-right.html">Gallery Right</a></li> 
              <li><a href="single-product-sticky-left.html">Sticky Left</a></li> 
              <li><a href="single-product-sticky-right.html">Sticky Right</a></li> 
              <li><a href="single-product-slider-box.html">Slider Box</a></li> 
             </ul> </li> 
           </ul> </li> 
          <li class="menu-item-has-children"><a href="#">PAGES</a> 
           <ul class="mega-menu three-column"> 
            <li><a href="#">Column One</a> 
             <ul> 
              <li><a href="cart.html">Cart</a></li> 
              <li><a href="checkout.html">Checkout</a></li> 
              <li><a href="wishlist.html">Wishlist</a></li> 
             </ul> </li> 
            <li><a href="#">Column Two</a> 
             <ul> 
              <li><a href="my-account.html">My Account</a></li> 
              <li><a href="login-register.html">Login Register</a></li> 
              <li><a href="faq.html">FAQ</a></li> 
             </ul> </li> 
            <li><a href="#">Column Three</a> 
             <ul> 
              <li><a href="compare.html">Compare</a></li> 
              <li><a href="contact.html">Contact</a></li> 
              <li><a href="about.html">About Us</a></li> 
             </ul> </li> 
           </ul> </li> 
          <li class="menu-item-has-children"><a href="#">BLOG</a> 
           <ul class="sub-menu"> 
            <li><a href="/articlehome">Blog 3 column</a></li> 
            <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li> 
            <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li> 
            <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li> 
            <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li> 
            <li><a href="blog-post-left-sidebar.html">Blog Post Left Sidebar</a></li> 
            <li><a href="blog-post-right-sidebar.html">Blog Post Right Sidebar</a></li> 
            <li><a href="blog-post-image-format.html">Blog Post Image Format</a></li> 
            <li><a href="blog-post-image-gallery.html">Blog Post Image Gallery Format</a></li> 
            <li><a href="blog-post-audio-format.html">Blog Post Audio Format</a></li> 
            <li><a href="blog-post-video-format.html">Blog Post Video Format</a></li> 
           </ul> </li> 
          <li><a href="/contact">关于我们</a></li> 
         </ul> 
        </nav> 
       </div> 
       <!-- end of navigation section --> 
      </div> 
      <div class="col-12 d-block d-lg-none"> 
       <!-- Mobile Menu --> 
       <div class="mobile-menu"></div> 
      </div> 
     </div> 
    </div> 
   </div> 
   <!--=======  End of navigation menu  =======--> 
  </div> 
  <!--=====  End of Header One  ======--> 

  <!--=============================================
  =            Hero Area One         =
  =============================================-->
   @if(count($errors)>0)
      <div class="mws-form-message warning">
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
        </div>
        @endif
      @if(session('success'))

    <!-- 错误提示信息结束 -->

     <a href="javascript:void(0)" class="d-flex align-items-center  btn btn-gradient-danger btn-fw" id="success">
        {{session('success')}}
      </a>
      @endif
      @if(session('error'))
      <a href="javascript:void(0)" class="mws-form-message error btn btn-gradient-danger btn-fw" id="error">
          {{session('error')}}
      </a>
      @endif
  @section('home')

  @show
  <!--=====  End of instagram section  ======-->
  <!--=============================================
  =            Footer         =
  =============================================-->
  <div class="footer-container pt-60 pb-60">
   <!--=======  footer navigation container  =======-->
   <div class="footer-navigation-container mb-60">
    <div class="container">
     <div class="row">
      <div class="col-12 col-lg-4 col-md-6 col-sm-6 mb-20 mb-lg-0 mb-xl-0 mb-md-35 mb-sm-35">
       <!--=======  single footer  =======-->
       <div class="single-footer">
        <!--=======  Single block  =======-->
        <div class="single-block mb-35">
         <h3 class="footer-title">Need Help?</h3>
         <p>Call: 1-800-345-6789</p>
        </div>
        <!--=======  End of Single block  =======-->
        <!--=======  Single block  =======-->
        <div class="single-block mb-35">
         <h3 class="footer-title">Products &amp; Sales</h3>
         <p>Call: 1-877-345-6789</p>
        </div>
        <!--=======  End of Single block  =======-->
        <!--=======  Single block  =======-->
        <div class="single-block">
         <h3 class="footer-title">Check Order Status</h3>
         <p> <a href="my-account.html">Click here</a> to check Order Status.</p>
        </div>
        <!--=======  End of Single block  =======-->
       </div>
       <!--=======  End of single footer  =======-->
      </div>
      <div class="col-12 col-lg-2 col-md-6 col-sm-6 mb-20 mb-lg-0 mb-xl-0 mb-md-35 mb-sm-35">
       <!--=======  single footer  =======-->
       <div class="single-footer">
        <h3 class="footer-title mb-20">Products</h3>
        <ul>
         <li><a href="#">Prices Drop</a></li>
         <li><a href="#">New Products</a></li>
         <li><a href="#">Best Sales</a></li>
         <li><a href="#">Contact Us</a></li>
         <li><a href="#">My Account</a></li>
        </ul>
       </div>
       <!--=======  End of single footer  =======-->
      </div>
      <div class="col-12 col-lg-2 col-md-6 col-sm-6 mb-20 mb-xs-35 mb-lg-0 mb-xl-0">
       <!--=======  single footer  =======-->
       <div class="single-footer">
        <h3 class="footer-title mb-20">Our Company</h3>
        <ul>
         <li><a href="#">Delivery</a></li>
         <li><a href="#">Legal Notice</a></li>
         <li><a href="#">About Us</a></li>
         <li><a href="#">Contact Us</a></li>
         <li><a href="#">Sitemap</a></li>
         <li><a href="#">Stores</a></li>
        </ul>
       </div>
       <!--=======  End of single footer  =======-->
      </div>
      <div class="col-12 col-lg-4 col-md-6 col-sm-6">
       <!--=======  single footer  =======-->
       <div class="single-footer mb-35">
        <h3 class="footer-title mb-20">Newsletter</h3>
        <div class="newsletter-form mb-20">
         <form id="mc-form" class="mc-form subscribe-form">
          <input type="email" placeholder="Your email address" />
          <button type="submit" value="submit"><i class="lnr lnr-envelope"></i></button>
         </form>
        </div>
        <!-- mailchimp-alerts Start -->
        <div class="mailchimp-alerts mb-20">
         <div class="mailchimp-submitting"></div>
         <!-- mailchimp-submitting end -->
         <div class="mailchimp-success"></div>
         <!-- mailchimp-success end -->
         <div class="mailchimp-error"></div>
         <!-- mailchimp-error end -->
        </div>
        <!-- mailchimp-alerts end -->
       </div>
       <!--=======  End of single footer  =======-->
       <!--=======  single footer  =======-->
       <div class="single-footer">
        <h3 class="footer-title mb-20">Address</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi corporis, necessitatibus officiis dolor facere ipsum rem sed itaque ea eos.</p>
        <p>New York</p>
       </div>
       <!--=======  End of single footer  =======-->
      </div>
     </div>
    </div>
   </div>
   <!--=======  End of footer navigation container  =======-->
   <!--=======  footer social link container  =======-->
   <div class="footer-social-link-container pt-15 pb-15 mb-60">
    <div class="container">
     <div class="row align-items-center">
      <div class="col-12 col-lg-6 col-md-7 mb-sm-15 text-left text-sm-center text-lg-left">
       <!--=======  app download area  =======-->
       <div class="app-download-area">
        <span class="title">Free App:</span>
        <a target="_blank" href="#" class="app-download-btn apple-store"><i class="fa fa-apple"></i> Apple Store</a>
        <a target="_blank" href="#" class="app-download-btn google-play"><i class="fa fa-android"></i> Google play</a>
       </div>
       <!--=======  End of app download area  =======-->
      </div>
      <div class="col-12 col-lg-6 col-md-5 text-left text-sm-center text-md-right">
       <div class="social-link">
        <span class="title">Follow Us:</span>
        <ul>
         <li><a target="_blank" href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
         <li><a target="_blank" href="https://www.rss.com/"><i class="fa fa-rss"></i></a></li>
         <li><a target="_blank" href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
         <li><a target="_blank" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
         <li><a target="_blank" href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a></li>
         <li><a target="_blank" href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
        </ul>
       </div>
      </div>
     </div>
    </div>
   </div>
   <!--=======  End of footer social link container  =======-->
   <!--=======  footer bottom navigation  =======-->
   <div class="footer-bottom-navigation text-center mb-20">
    <div class="container">
     <div class="row">
      <div class="col-lg-12">
       <!--=======  navigation-container  =======-->
       <div class="navigation-container">
        <ul>
        @foreach($link as $rows)
        @if($rows->status==1)
         <li><a href="{{$rows->link_url}}">{{$rows->urlname}}</a> <span class="separator">|</span></li>
         @endif
         @endforeach
        </ul>
       </div>
       <!--=======  End of navigation-container  =======-->
      </div>
     </div>
    </div>
   </div>
   <!--=======  End of footer bottom navigation  =======-->
   <!--=======  copyright section  =======-->
   <div class="copyright-section text-center">
    <div class="container">
     <div class="row">
      <div class="col-lg-12">
       <!--=======  Copyright text  =======-->
       <p class="copyright-text">Copyright @ 2018 <a href="http://www.17sucai.com/">Pataku</a>. All Rights Reserved</p>
       <!--=======  End of Copyright text  =======-->
      </div>
     </div>
    </div>
   </div>
   <!--=======  End of copyright section  =======-->
  </div>
  <!--=====  End of Footer  ======-->
  <!--=============================================
  =            Quick view modal         =
  =============================================-->
  <div class="modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
     </div>
     <div class="modal-body">
      <div class="row">
       <div class="col-lg-6 col-md-6 col-xs-12">
        <!-- product quickview image gallery -->
        <div class="product-image-slider quickview-product-image-slider flex-row-reverse">
         <!--Modal Tab Content Start-->
         <div class="tab-content product-large-image-list quickview-product-large-image-list">
          <div class="tab-pane fade show active" id="single-slide-quick-1" role="tabpanel" aria-labelledby="single-slide-tab-quick-1">
           <!--Single Product Image Start-->
           <div class="single-product-img img-full">
            <img src="/static/home/assets/images/single-product-slider/01.jpg" class="img-fluid" alt="" />
           </div>
           <!--Single Product Image End-->
          </div>
          <div class="tab-pane fade" id="single-slide-quick-2" role="tabpanel" aria-labelledby="single-slide-tab-quick-2">
           <!--Single Product Image Start-->
           <div class="single-product-img img-full">
            <img src="/static/home/assets/images/single-product-slider/02.jpg" class="img-fluid" alt="" />
           </div>
           <!--Single Product Image End-->
          </div>
          <div class="tab-pane fade" id="single-slide-quick-3" role="tabpanel" aria-labelledby="single-slide-tab-quick-3">
           <!--Single Product Image Start-->
           <div class="single-product-img img-full">
            <img src="/static/home/assets/images/single-product-slider/03.jpg" class="img-fluid" alt="" />
           </div>
           <!--Single Product Image End-->
          </div>
          <div class="tab-pane fade" id="single-slide-quick-4" role="tabpanel" aria-labelledby="single-slide-tab-quick-4">
           <!--Single Product Image Start-->
           <div class="single-product-img img-full">
            <img src="/static/home/assets/images/single-product-slider/04.jpg" class="img-fluid" alt="" />
           </div>
           <!--Single Product Image End-->
          </div>
         </div>
         <!--Modal Content End-->
         <!--Modal Tab Menu Start-->
         <div class="product-small-image-list quickview-product-small-image-list">
          <div class="nav small-image-slider quickview-small-image-slider" role="tablist">
           <div class="single-small-image img-full">
            <a data-toggle="tab" id="single-slide-tab-quick-1" href="#single-slide-quick-1"><img src="/static/home/assets/images/single-product-slider/01.jpg" class="img-fluid" alt="" /></a>
           </div>
           <div class="single-small-image img-full">
            <a data-toggle="tab" id="single-slide-tab-quick-2" href="#single-slide-quick-2"><img src="/static/home/assets/images/single-product-slider/02.jpg" class="img-fluid" alt="" /></a>
           </div>
           <div class="single-small-image img-full">
            <a data-toggle="tab" id="single-slide-tab-quick-3" href="#single-slide-quick-3"><img src="/static/home/assets/images/single-product-slider/03.jpg" class="img-fluid" alt="" /></a>
           </div>
           <div class="single-small-image img-full">
            <a data-toggle="tab" id="single-slide-tab-quick-4" href="#single-slide-quick-4"><img src="/static/home/assets/images/single-product-slider/04.jpg" alt="" /></a>
           </div>
          </div>
         </div>
         <!--Modal Tab Menu End-->
        </div>
        <!-- end of product quickview image gallery -->
       </div>
       <div class="col-lg-6 col-md-6 col-xs-12">
        <!-- product quick view description -->
        <div class="product-feature-details">
         <h2 class="product-title mb-15">Kaoreet lobortis sagittis laoreet</h2>
         <h2 class="product-price mb-15"> <span class="main-price discounted">$12.90</span> <span class="discounted-price"> $10.00</span> <span class="discount-percentage">Save 8%</span> </h2>
         <p class="product-description mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus</p>
         <div class="cart-buttons mb-20">
          <div class="pro-qty mr-10">
           <input type="text" value="1" />
          </div>
          <div class="add-to-cart-btn">
           <a href="#" class="pataku-btn"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
          </div>
         </div>
         <div class="social-share-buttons">
          <h3>share this product</h3>
          <ul>
           <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
           <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
           <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
           <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
          </ul>
         </div>
        </div>
        <!-- end of product quick view description -->
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of Quick view modal  ======-->
  <!-- scroll to top  -->
  <a href="#" class="scroll-top"></a>
  <!-- end of scroll to top -->
  <!-- JS
  ============================================ -->
  <!-- jQuery JS -->
  <script src="/static/home/assets/js/vendor/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="/static/home/assets/js/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="/static/home/assets/js/bootstrap.min.js"></script>
  <!-- Plugins JS -->
  <script src="/static/home/assets/js/plugins.js"></script>
  <!-- Main JS -->
  <script src="/static/home/assets/js/main.js"></script>
 <script src="/static/admins/vendors/js/vendor.bundle.base.js"></script>
  <script src="/static/admins/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/static/admins/js/off-canvas.js"></script>
  <script src="/static/admins/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->


  <script src="/static/admins/js/dashboard.js"></script>
  <!-- 校验类点击消失js -->
  <script src="/static/admins/js/core/mws.js"></script>
 </body>
</html>
