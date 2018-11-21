@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <body>
  <div class="hero-area pt-15 mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <!--=======  slider container  =======-->
      <div class="slider-container">
       <!--=======  hero slider one  =======-->
       <div class="hero-slider-one">
        <!--=======  slider item  =======-->
        @foreach($wheel as $row)
        @if($row->status==1)
        <div class="hero-slider-item"style ="background-image: url('{{$row->l_pic}}')">
         <!--=======  slider content  =======-->
         <div class="slider-content  d-flex flex-column justify-content-center align-items-start h-100">
          <p>Beautiful and luxurious Decor at Affordable price</p>
          <h1>ACCENT <span>CHAIR</span></h1>
          <a href="shop-left-sidebar.html" class="pataku-btn slider-btn-1">SHOP NOW</a>
         </div>
         <!--=======  End of slider content  =======-->
        </div>
        @endif
        <!--=======  End of slider item  =======-->
        <!--=======  slider item  =======-->
        @endforeach
        <!--=======  End of slider item  =======-->
       </div>
       <!--=======  End of hero slider one  =======-->
      </div>
      <!--=======  End of slider container  =======-->
     </div>
    </div>
    <div class="row">
     <div class="col-lg-12 pt-40 pb-40">
      <!--=======  feature area  =======-->
      <div class="feature-area">
       <!--=======  single feature  =======-->
       <div class="single-feature mb-md-20 mb-sm-20">
        <span class="icon"><i class="lnr lnr-rocket"></i></span>
        <p>免费配送<span>所有广州订单免运费</span></p>
       </div>
       <!--=======  End of single feature  =======-->
       <!--=======  single feature  =======-->
       <div class="single-feature mb-md-20 mb-sm-20">
        <span class="icon"><i class="lnr lnr-phone"></i></span>
        <p>全天候支持每天<span>24小时与我们联系</span></p>
       </div>
       <!--=======  End of single feature  =======-->
       <!--=======  single feature  =======-->
       <div class="single-feature mb-xxs-20">
        <span class="icon"><i class="lnr lnr-undo"></i></span>
        <p>100%退款<span>您有30天的退货时间</span></p>
       </div>
       <!--=======  End of single feature  =======-->
       <!--=======  single feature  =======-->
       <div class="single-feature mb-xxs-20">
        <span class="icon"><i class="lnr lnr-gift"></i></span>
        <p>付款安全<span>我们确保安全付款</span></p>
       </div>
       <!--=======  End of single feature  =======-->
      </div>
      <!--=======  End of feature area  =======-->
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of Hero Area One  ======-->
  <!--=============================================
  =            featured categories         =
  =============================================-->
  <div class="featured-categories mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center mb-40">
      <div class="section-title">
       <h2>特别<span>推荐</span></h2>
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-lg-6 col-md-6 mb-sm-30">
      <div class="banner">
       <a href="shop-left-sidebar.html"> <img src="/static/home/assets/images/category-banner/home1-banner1.jpg" class="img-fluid" alt="" /> </a>
       <span class="banner-category-title"> <a href="shop-left-sidebar.html">家具</a> </span>
      </div>
     </div>
     <div class="col-lg-6 col-md-6">
      <div class="row">
       <div class="col-lg-12 col-md-12 mb-30">
        <div class="banner">
         <a href="shop-left-sidebar.html"> <img src="/static/home/assets/images/category-banner/home1-banner2.jpg" class="img-fluid" alt="" /> </a>
         <span class="banner-category-title"> <a href="shop-left-sidebar.html">客房</a> </span>
        </div>
       </div>
      </div>
      <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="banner">
         <a href="shop-left-sidebar.html"> <img src="/static/home/assets/images/category-banner/home1-banner3.jpg" class="img-fluid" alt="" /> </a>
         <span class="banner-category-title"> <a href="shop-left-sidebar.html">灯具</a> </span>
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="banner">
         <a href="shop-left-sidebar.html"> <img src="/static/home/assets/images/category-banner/home1-banner4.jpg" class="img-fluid" alt="" /> </a>
         <span class="banner-category-title"> <a href="shop-left-sidebar.html">装饰</a> </span>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of featured categories  ======-->
  <!--=============================================
  =            Double row product slider          =
  =============================================-->
  <div class="double-row-product-slider mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center mb-40">
      <div class="section-title">
       <h2>最新的<span>产品</span></h2>
       <p>浏览我们的新产品系列，您一定会找到您想要的产品。</p>
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-lg-12">
      <!--=======  top selling product slider container  =======-->
      <div class="ptk-slider double-row-slider-container" data-row="2">
      <!--所有商品遍历开始--> 
      @foreach($info as $row) 
       <div class="col"> 
        <!--=======  single product  =======--> 
        <div class="ptk-product"> 
         <div class="image"> 
          <a href="/goodinfo/{{$row->id}}" > <img src="/static/admin/uploads/z_goods/{{$row->z_pic}}" class="img-fluid" alt="" height="198px" /> </a> 
          <!--=======  hover icons  =======--> 
           <a class="hover-icon mm" index="{{$row->id}}" data-toggle="modal" data-target="#quick-view-modal-container" ><i class="lnr lnr-eye"></i></a> 
          <a class="hover-icon" h="#"><i class="lnr lnr-heart"></i></a> 
          <!--=======  End of hover icons  =======--> 
          <!--=======  badge  =======--> 
          <div class="product-badge"> 
          </div> 
          <!--=======  End of badge  =======--> 
         </div> 
         <div class="content"> 
          <p class="product-title" style="display: block;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width:100%;"><a href="/goodinfo/{{$row->id}}" style="font-size:15px;">{{$row->goods_name}}</a></p> 
          <p class="product-price"><span class="discounted-price">￥{{$row->price}}</span> </p> 
         </div> 
         <div class="rating"> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star"></i> 
         </div> 
        </div> 
        <!--=======  End of single product  =======--> 
       </div>  
       @endforeach
       <!--所有商品遍历结束-->
      </div>
      <!--=======  End of top selling product slider container  =======-->
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of Double row product slider   ======-->
  <!--=============================================
  =            fullwidth banner area         =
  =============================================-->
  <div class="fullwidth-banner-area fullwidth-banner-bg fullwidth-banner-bg-1 pt-120 pb-120 pt-xs-80 pb-xs-80 mb-80">
   <div class="container">
    <div class="row">
     <div class="col-xl-6 col-lg-7 col-md-9 col-12">
      <!--=======  fullwidth banner content  =======-->
      <div class="fullwidth-banner-content">
       <p class="fullwidth-banner-title">It's your job to have the idea. It's ours to make it happen.</p>
       <p>We are a Melboume based furniture maker helping people bring their iadeas to life.</p>
       <a href="shop-left-sidebar.html">View our products <i class="fa fa-angle-right"></i></a>
      </div>
      <!--=======  End of fullwidth banner content  =======-->
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of fullwidth banner area  ======-->
  <!--=============================================
  =            deal and propular product area         =
  =============================================-->
  <div class="deal-popular-product-area mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-6 mb-md-80 mb-sm-80">
      <div class="section-title mb-40">
       <h2>优惠周</h2>
       <p>本周优惠商品，每周都会更新优惠商品</p>
      </div>
      <div class="row">
       <div class="col-lg-12">
        <!--=======  deal slider container  =======-->
        <div class="ptk-slider deal-slider-container">
        <!--优惠商品遍历开始-->
        @foreach($info as $row) 
         <div class="col"> 
          <!--=======  single product  =======--> 
          <div class="product-countdown" data-countdown="2020/05/01"></div> 
          <div class="ptk-product"> 
           <div class="image"> 
            <a href="/goodinfo/{{$row->id}}"> <img src="/static/admin/uploads/z_goods/{{$row->z_pic}}" class="img-fluid" alt="" /> </a> 
            <!--=======  hover icons  =======--> 
           <a class="hover-icon mm" index="{{$row->id}}" href="#" data-toggle="modal" data-target="#quick-view-modal-container"><i class="lnr lnr-eye"></i></a> 
            <a class="hover-icon" href="#"><i class="lnr lnr-heart"></i></a> 
            <!--=======  End of hover icons  =======--> 
            <!--=======  badge  =======--> 
            <div class="product-badge"> 
             <span class="new-badge">NEW</span> 
             <span class="discount-badge">-8%</span> 
            </div> 
            <!--=======  End of badge  =======--> 
           </div> 
           <div class="content"> 
            <p class="product-title" style="display: block;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width:100%;"><a href="/goodinfo/{{$row->id}}">{{$row->goods_name}}</a></p> 
            <p class="product-price">  <span class="discounted-price">￥{{$row->price}}</span> </p> 
           </div> 
           <div class="rating"> 
            <i class="lnr lnr-star active"></i> 
            <i class="lnr lnr-star active"></i> 
            <i class="lnr lnr-star active"></i> 
            <i class="lnr lnr-star active"></i> 
            <i class="lnr lnr-star"></i> 
           </div> 
          </div> 
          <!--=======  End of single product  =======--> 
         </div>
         @endforeach
        <!--优惠商品遍历结束-->


        </div>
        <!--=======  End of deal slider container  =======-->
       </div>
      </div>
     </div>
     <div class="col-lg-6">
      <div class="section-title mb-40">
       <h2>客厅类专栏</h2>
       <p>We offer the best selection furniture at prices you will love!</p>
      </div>
      <div class="row">
       <div class="col-lg-12">
        <!--=======  popular product slider  =======-->
        <div class="ptk-slider popular-product-slider" data-row="2">
        <!--客厅类商品遍历-->
        @foreach($sear as $data) 
         <div class="col"> 
          <!--=======  single product  =======--> 
          <div class="ptk-product"> 
           <div class="image"> 
            <a href="/goodinfo/{{$data->id}}"> <img src="/static/admin/uploads/z_goods/{{$data->z_pic}}" class="img-fluid" alt="" /> </a> 
           </div> 
           <div class="content"> 
            <p class="product-title" style="display: block;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width:50%;"><a href="/goodinfo/{{$data->id}}">{{$data->goods_name}}</a></p> 
            <p class="product-price"><span class="discounted-price">￥{{$data->price}}</span> </p> 
            <div class="rating rating-product-style-2"> 
             <i class="lnr lnr-star active"></i> 
             <i class="lnr lnr-star active"></i> 
             <i class="lnr lnr-star active"></i> 
             <i class="lnr lnr-star active"></i> 
             <i class="lnr lnr-star"></i> 
            </div> 
           </div> 
          </div> 
          <!--=======  End of single product  =======--> 
         </div>
         @endforeach
         <!--客厅类商品遍历结束-->
        </div>
        <!--=======  End of popular product slider  =======-->
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of deal and propular product area  ======-->
  <!--=============================================
  =            container width banner         =
  =============================================-->
  <div class="containerwidth-banner-area mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <a href="shop-left-sidebar.html">
       <div class="banner containerwidth-banner-bg containerwidth-banner-bg-1">
        <div class="row  h-100">
         <div class="col-lg-4 offset-lg-8 col-md-12">
          <div class="banner-content d-flex flex-column align-items-center align-items-lg-start  justify-content-center h-100">
           <p class="normal-text">Living Room Furniture</p>
           <p class="color-text">Up to 50% Off</p>
           <p class="underline-text">Shop The Latest Style</p>
          </div>
         </div>
        </div>
       </div> </a>
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of container width banner  ======-->
  <!--=============================================
  =            Top selling product section         =
  =============================================-->
  <div class="top-selling-product-area mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center mb-40">
      <div class="section-title">
       <h2>Top <span>Selling</span> Products</h2>
       <p>Browse the collection of our top selling, You will definitely find what you are looking for.</p>
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-lg-12">
      <!--=======  top selling product slider container  =======-->
      <div class="ptk-slider top-selling-product-slider-container">
      <!--商品遍历-->
      @foreach($info as $row) 
       <div class="col"> 
        <!--=======  single product  =======--> 
        <div class="ptk-product"> 
         <div class="image"> 
          <a href="/goodinfo/{{$row->id}}"> <img src="/static/admin/uploads/z_goods/{{$row->z_pic}}" class="img-fluid" alt="" /> </a> 
          <!--=======  hover icons  =======--> 
          <a class="hover-icon mm" index="{{$row->id}}" href="#" data-toggle="modal" data-target="#quick-view-modal-container"><i class="lnr lnr-eye"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-heart"></i></a> 
          <!--=======  End of hover icons  =======--> 
          <!--=======  badge  =======--> 
          <div class="product-badge"> 
           <span class="new-badge">NEW</span> 
           <span class="discount-badge">-8%</span> 
          </div> 
          <!--=======  End of badge  =======--> 
         </div> 
         <div class="content"> 
          <p class="product-title" style="display: block;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width:50%;"><a href="/goodinfo/{{$row->id}}">{{$row->goods_name}}</a></p> 
          <p class="product-price"> <span class="discounted-price">￥{{$data->price}}</span> </p> 
         </div> 
         <div class="rating"> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star"></i> 
         </div> 
        </div> 
        <!--=======  End of single product  =======--> 
       </div>
       @endforeach
       <!--商品遍历结束-->



      </div>
      <!--=======  End of top selling product slider container  =======-->
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of Top selling product section  ======-->
  <!--=============================================
  =            Blog slider section         =
  =============================================-->
  <div class="blog-slider-section mb-80">
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center mb-40">
      <div class="section-title">
       <h2>Our <span>Blog</span> Posts</h2>
       <p>Do you want to present posts in the best way to highlight interesting moments of your blog?</p>
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-lg-12">
      <!--=============================================
          =            Blog slider container         =
          =============================================-->
      <div class="blog-post-slider-container ptk-slider">
       <div class="col">
        <!--=======  single slider post  =======-->
        <div class="single-slider-blog-post">
         <div class="image">
          <a href="blog-post-right-sidebar.html"> <img src="/static/home/assets/images/slider/blog/01.jpg" class="img-fluid" alt="" /> </a>
         </div>
         <div class="content">
          <p class="blog-title"><a href="blog-post-right-sidebar.html">Typi non habent claritatem insitam</a></p>
          <a href="blog-post-right-sidebar.html" class="readmore-btn">Read More</a>
         </div>
        </div>
        <!--=======  End of single slider post  =======-->
       </div>
       <div class="col">
        <!--=======  single slider post  =======-->
        <div class="single-slider-blog-post">
         <div class="image">
          <a href="blog-post-right-sidebar.html"> <img src="/static/home/assets/images/slider/blog/02.jpg" class="img-fluid" alt="" /> </a>
         </div>
         <div class="content">
          <p class="blog-title"><a href="blog-post-right-sidebar.html">Typi non habent claritatem insitam</a></p>
          <a href="blog-post-right-sidebar.html" class="readmore-btn">Read More</a>
         </div>
        </div>
        <!--=======  End of single slider post  =======-->
       </div>
       <div class="col">
        <!--=======  single slider post  =======-->
        <div class="single-slider-blog-post">
         <div class="image">
          <a href="blog-post-right-sidebar.html"> <img src="/static/home/assets/images/slider/blog/03.jpg" class="img-fluid" alt="" /> </a>
         </div>
         <div class="content">
          <p class="blog-title"><a href="blog-post-right-sidebar.html">Typi non habent claritatem insitam</a></p>
          <a href="blog-post-right-sidebar.html" class="readmore-btn">Read More</a>
         </div>
        </div>
        <!--=======  End of single slider post  =======-->
       </div>
       <div class="col">
        <!--=======  single slider post  =======-->
        <div class="single-slider-blog-post">
         <div class="image">
          <a href="blog-post-right-sidebar.html"> <img src="/static/home/assets/images/slider/blog/04.jpg" class="img-fluid" alt="" /> </a>
         </div>
         <div class="content">
          <p class="blog-title"><a href="blog-post-right-sidebar.html">Typi non habent claritatem insitam</a></p>
          <a href="blog-post-right-sidebar.html" class="readmore-btn">Read More</a>
         </div>
        </div>
        <!--=======  End of single slider post  =======-->
       </div>
      </div>
      <!--=====  End of Blog slider container  ======-->
     </div>
    </div>
   </div>
  </div>
  <!--=====  End of Blog slider section  ======-->
  <!--=============================================
  =            instagram section         =
  =============================================-->
  <div class="instagram-section mb-85">
   <div class="container">
    <div class="row">
     <div class="col-lg-12 text-center mb-40">
      <div class="section-title instagram-title">
       <h2>#Pataku Instagram</h2>
       <p><a href="#" target="_blank">Follow our instagram</a></p>
      </div>
     </div>
    </div>
    <div class="row">
     <div class="col-lg-12">
      <!--=======  instagram slider container  =======-->
      <div class="ptk-slider instagram-slider-container">
       <div class="col">
        <!--=======  single insta item  =======-->
        <div class="single-insta-item">
         <a href="/static/home/assets/images/instagram/01.jpg" class="big-image-popup"> <img src="/static/home/assets/images/instagram/01.jpg" class="img-fluid" alt="" /> </a>
        </div>
        <!--=======  End of single insta item  =======-->
       </div>
       <div class="col">
        <!--=======  single insta item  =======-->
        <div class="single-insta-item">
         <a href="/static/home/assets/images/instagram/02.jpg" class="big-image-popup"> <img src="/static/home/assets/images/instagram/02.jpg" class="img-fluid" alt="" /> </a>
        </div>
        <!--=======  End of single insta item  =======-->
       </div>
       <div class="col">
        <!--=======  single insta item  =======-->
        <div class="single-insta-item">
         <a href="/static/home/assets/images/instagram/03.jpg" class="big-image-popup"> <img src="/static/home/assets/images/instagram/03.jpg" class="img-fluid" alt="" /> </a>
        </div>
        <!--=======  End of single insta item  =======-->
       </div>
       <div class="col">
        <!--=======  single insta item  =======-->
        <div class="single-insta-item">
         <a href="/static/home/assets/images/instagram/04.jpg" class="big-image-popup"> <img src="/static/home/assets/images/instagram/04.jpg" class="img-fluid" alt="" /> </a>
        </div>
        <!--=======  End of single insta item  =======-->
       </div>
       <div class="col">
        <!--=======  single insta item  =======-->
        <div class="single-insta-item">
         <a href="/static/home/assets/images/instagram/05.jpg" class="big-image-popup"> <img src="/static/home/assets/images/instagram/05.jpg" class="img-fluid" alt="" /> </a>
        </div>
        <!--=======  End of single insta item  =======-->
       </div>
      </div>
      <!--=======  End of instagram slider container  =======-->
     </div>
    </div>
   </div>
  </div>
  <!--商品模态框-->
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
          <!--遍历模态框右侧图片--> 
         <div class="tab-content product-large-image-list quickview-product-large-image-list cc"> 
          
           
         </div> 
         <!--Modal Content 遍历结束--> 
         <!--Modal Tab Menu Start-->
         <!--遍历模态框左侧图片--> 
         <div class="product-small-image-list quickview-product-small-image-list"> 
          <div class="nav small-image-slider quickview-small-image-slider dd" role="tablist" > 
             
          </div> 
         </div> 
         <!--Modal Tab Menu 遍历结束--> 
        </div> 
        <!-- end of product quickview image gallery --> 
       </div> 
       <div class="col-lg-6 col-md-6 col-xs-12"> 
        <!-- product quick view description --> 
        <div class="product-feature-details"> 
         <h2 class="product-title mb-15" id="goods_name">Kaoreet lobortis sagittis laoreet</h2> 
         <h2 class="product-price mb-15"><span class="discounted-price" id="price"> $10.00</span></h2> 
         <p class="product-description mb-20" id="desrc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus</p> 
         <div class="cart-buttons mb-20">
         <form action="/hcart" method="post">
            {{csrf_field()}}
          <input type="hidden" name="id" value="1" id="id"> 
         <div class="pro-qty mr-10"> 
            <input type="text" value="1" class="cartnum" name="cartnum" /> 
         </div> 
          <div class="add-to-cart-btn"> 
           <input type="submit" value="添加到购物车" class="pataku-btn"> 
          </div>
          </form>  
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
 </body>
 <script type="text/javascript">

    //模态框商品详情jq
   $('.mm').click(function(){
    var id = $(this).attr('index');

     $.get("/modal",{id:id},function(data)
      {
        var data = data.replace(/\s*/g,"");
        var obj = JSON.parse(data);
        //将返回的数据插到首页模态框
        $('#price').text('￥'+obj.price);
        $('#goods_name').text(obj.goods_name);
        $('#desrc').text(obj.desrc);
        $('#id').attr('value',obj.id);
        var pic=obj.pic;
        for(i=0;i<pic.length;i++){
          var a = '<div class="single-small-image img-full"><a data-toggle="tab" id="single-slide-tab-quick-'+i+'" href="#single-slide-quick-'+i+'"><img src="/static/admin/uploads/goods/'+pic[i]+'" class="img-fluid" alt="" /></a></div>';
          if (i == 0) {
            var b= '<div class="tab-pane fade show active c'+i+'" id="single-slide-quick-'+i+'" role="tabpanel" aria-labelledby="single-slide-tab-quick-'+i+'"></div>';
          }else{
            var b= '<div class="tab-pane fade c'+i+'" id="single-slide-quick-'+i+'" role="tabpanel" aria-labelledby="single-slide-tab-quick-'+i+'"></div>';
          }
          var c= '<div class="single-product-img img-full"> <img src="/static/admin/uploads/goods/'+pic[i]+'" class="img-fluid" alt="" /></div>';
          $('.dd').append(a);
          $('.cc').append(b);
          $('.c'+i).append(c);       
        }
      });
   })
 </script>
 </body>
</html>
@endsection
@section('title','灯饰人生')
