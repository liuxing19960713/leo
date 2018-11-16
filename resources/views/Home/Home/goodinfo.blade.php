﻿@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <body>
  <script src="/js/cart.js"></script>
  <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <div class="breadcrumb-container">
       <ul> 
        <li><a href="index.html">Home</a> <span class="separator">/</span></li> 
        <li class="active">Single Product</li> 
       </ul> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--=====  End of Breadcrumb Area  ======--> 
  <!--=============================================
    =            single product page content         =
    =============================================--> 
  <div class="single-product-page-content mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-6 mb-md-50 mb-sm-50"> 
      <!-- single product tabstyle one image gallery --> 
      <div class="product-image-slider pts1-product-image-slider pts-product-image-slider pts1-product-image-slider flex-row-reverse"> 
       <!--product large image start --> 
       <div class="tab-content product-large-image-list pts-product-large-image-list pts1-product-large-image-list" id="myTabContent"> 
          <!-- {{var_dump($pic)}} -->

        <div class="tab-pane fade show active" id="single-slide-1" role="tabpanel" aria-labelledby="single-slide-tab-1"> 
         <!--Single Product Image Start--> 
         <div class="single-product-img img-full"> 
          <img src="/static/home/assets/images/single-product-slider/01.jpg" class="img-fluid" alt="" /> 
          <a href="/static/admin/uploads/goods/{{$pic[0]}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a> 
         </div> 
         <!--Single Product Image End--> 
        </div>
        <!--遍历副图片-->
        <div class="tab-pane fade" id="single-slide-2" role="tabpanel" aria-labelledby="single-slide-tab-2"> 
         <!--Single Product Image Start--> 
         <div class="single-product-img img-full"> 
          <img src="/static/home/assets/images/single-product-slider/02.jpg" class="img-fluid" alt="" /> 
          <a href="/static/admin/uploads/goods/{{$pic[1]}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a> 
         </div> 
         <!--Single Product Image End--> 
        </div>
        <!--遍历-->
        <div class="tab-pane fade" id="single-slide-3" role="tabpanel" aria-labelledby="single-slide-tab-3"> 
         <!--Single Product Image Start--> 
         <div class="single-product-img img-full"> 
          <img src="/static/home/assets/images/single-product-slider/03.jpg" class="img-fluid" alt="" /> 
          <a href="/static/admin/uploads/goods/{{$pic[2]}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a> 
         </div> 
         <!--Single Product Image End--> 
        </div> 
       

       </div> 
       <!--product large image End--> 
       <!--product small image slider Start--> 
       <div class="product-small-image-list pts-product-small-image-list pts1-product-small-image-list"> 
        <div class="nav small-image-slider pts-small-image-slider pts1-small-image-slider" role="tablist"> 


         
          @foreach($pic as $key=> $r)
         <div class="single-small-image img-full"> 
          <a data-toggle="tab" id="single-slide-tab-{{$key}}" href="#single-slide-{{$key}}"><img src="/static/admin/uploads/goods/{{$r}}" class="img-fluid" alt="" /></a> 
         </div> 
         @endforeach
<!-- 
         <div class="single-small-image img-full"> 
          <a data-toggle="tab" id="single-slide-tab-2" href="#single-slide-2"><img src="/static/home/assets/images/single-product-slider/02.jpg" class="img-fluid" alt="" /></a> 
         </div> 
         <div class="single-small-image img-full"> 
          <a data-toggle="tab" id="single-slide-tab-3" href="#single-slide-3"><img src="/static/home/assets/images/single-product-slider/03.jpg" class="img-fluid" alt="" /></a> 
         </div> 
         <div class="single-small-image img-full"> 
          <a data-toggle="tab" id="single-slide-tab-4" href="#single-slide-4"><img src="/static/home/assets/images/single-product-slider/04.jpg" alt="" /></a> 
         </div> 
 -->
        </div> 
       </div> 
       <!--product small image slider End--> 
      </div> 
      <!-- end of single product tabstyle one image gallery --> 
     </div> 
     <div class="col-lg-6"> 
      <!--=======  single product details  =======--> 

      <div class="single-product-details-container"> 
       <p class="product-title mb-15">{{$info->goods_name}}</p> 
       <div class="rating d-inline-block mb-15"> 
        <i class="lnr lnr-star active"></i> 
        <i class="lnr lnr-star active"></i> 
        <i class="lnr lnr-star active"></i> 
        <i class="lnr lnr-star active"></i> 
        <i class="lnr lnr-star"></i> 
       </div> 
       <p class="review-links d-inline-block"> <a href="#"><i class="fa fa-comment-o"></i> 阅读评论 (1) </a> <a href="#"><i class="fa fa-pencil"></i> 写评论</a> </p> 
       <p class="product-price mb-30">  <span class="discounted-price">{{$info->price}}</span> </p> 
       <p class="product-description mb-15"> {{$info->desrc}}</p> 
       <form action="/hcart" method="post">
        {{csrf_field()}}
          <input type="hidden" name="id" value="{{$info->id}}">

       <div class="cart-buttons mb-30"> 
        <p class="mb-15">数量</p> 
        <div class="pro-qty mr-10"> 
         <input type="text" value="1" class="cartnum" name="cartnum" /> 
        </div> 
        <input type="submit" value="添加到购物车" class="pataku-btn"> 
       </div> 
       </form>
       <p class="wishlist-link mb-30"><a href="#"> <i class="fa fa-heart"></i> 加入到愿望清单</a></p> 
       <div class="social-share-buttons mb-30"> 
        <p>分享</p> 
        <ul> 
         <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
         <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li> 
         <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li> 
         <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li> 
        </ul> 
       </div> 
       <div class="policy-list"> 
        <ul> 
         <li> <img src="/static/home/assets/images/icons/shield.png" alt="" /> Security policy (edit with Customer reassurance module)</li> 
         <li> <img src="/static/home/assets/images/icons/truck.png" alt="" /> Delivery policy (edit with Customer reassurance module)</li> 
         <li> <img src="/static/home/assets/images/icons/compare.png" alt="" /> Return policy (edit with Customer reassurance module)</li> 
        </ul> 
       </div> 
      </div> 


      <!--=======  End of single product details  =======--> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--=====  End of single product page content  ======--> 
  <!--=============================================
    =            single product tab         =
    =============================================--> 
  <div class="single-product-tab-section mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <div class="tab-slider-wrapper"> 
       <nav> 
        <div class="nav nav-tabs" id="nav-tab" role="tablist"> 
         <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-selected="true">描述</a> 
         <a class="nav-item nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab" aria-selected="false">优惠劵</a> 
         <a class="nav-item nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-selected="false">评论(3)</a> 
        </div> 
       </nav> 
       <div class="tab-content" id="nav-tabContent"> 
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab"> 
         <p class="product-desc">{{$info->desrc}}</p> 
        </div> 
        <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab"> 
         <table class="table-data-sheet"> 
          <tbody> 
           <tr class="odd"> 
            <td>Name</td> 
            <td>Kaoreet lobortis sagittis laoreet</td> 
           </tr> 
           <tr class="even"> 
            <td>Color</td> 
            <td>Yellow</td> 
           </tr> 
          </tbody> 
         </table> 
        </div> 
        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab"> 
         <div class="product-ratting-wrap"> 
          <div class="pro-avg-ratting"> 
           <h4>4.5 <span>(Overall)</span></h4> 
           <span>Based on 9 Comments</span> 
          </div> 
          <div class="ratting-list"> 
           <div class="sin-list float-left"> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <span>(5)</span> 
           </div> 
           <div class="sin-list float-left"> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star-o"></i> 
            <span>(3)</span> 
           </div> 
           <div class="sin-list float-left"> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star-o"></i> 
            <i class="fa fa-star-o"></i> 
            <span>(1)</span> 
           </div> 
           <div class="sin-list float-left"> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star-o"></i> 
            <i class="fa fa-star-o"></i> 
            <i class="fa fa-star-o"></i> 
            <span>(0)</span> 
           </div> 
           <div class="sin-list float-left"> 
            <i class="fa fa-star"></i> 
            <i class="fa fa-star-o"></i> 
            <i class="fa fa-star-o"></i> 
            <i class="fa fa-star-o"></i> 
            <i class="fa fa-star-o"></i> 
            <span>(0)</span> 
           </div> 
          </div> 
          <div class="rattings-wrapper"> 
           <div class="sin-rattings"> 
            <div class="ratting-author"> 
             <h3>Cristopher Lee</h3> 
             <div class="ratting-star"> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <span>(5)</span> 
             </div> 
            </div> 
            <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p> 
           </div> 
           <div class="sin-rattings"> 
            <div class="ratting-author"> 
             <h3>Nirob Khan</h3> 
             <div class="ratting-star"> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <span>(5)</span> 
             </div> 
            </div> 
            <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p> 
           </div> 
           <div class="sin-rattings"> 
            <div class="ratting-author"> 
             <h3>Rashed Mahmud</h3> 
             <div class="ratting-star"> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <i class="fa fa-star"></i> 
              <span>(5)</span> 
             </div> 
            </div> 
            <p>enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia res eos qui ratione voluptatem sequi Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci veli</p> 
           </div> 
          </div> 
          <div class="ratting-form-wrapper fix"> 
           <h3>Add your Comments</h3> 
           <form action="#"> 
            <div class="ratting-form row"> 
             <div class="col-12 mb-15"> 
              <h5>Rating:</h5> 
              <div class="ratting-star fix"> 
               <i class="fa fa-star-o"></i> 
               <i class="fa fa-star-o"></i> 
               <i class="fa fa-star-o"></i> 
               <i class="fa fa-star-o"></i> 
               <i class="fa fa-star-o"></i> 
              </div> 
             </div> 
             <div class="col-md-6 col-12 mb-15"> 
              <label for="name">Name:</label> 
              <input id="name" placeholder="Name" type="text" /> 
             </div> 
             <div class="col-md-6 col-12 mb-15"> 
              <label for="email">Email:</label> 
              <input id="email" placeholder="Email" type="text" /> 
             </div> 
             <div class="col-12 mb-15"> 
              <label for="your-review">Your Review:</label> 
              <textarea name="review" id="your-review" placeholder="Write a review"></textarea> 
             </div> 
             <div class="col-12"> 
              <input value="add review" type="submit" /> 
             </div> 
            </div> 
           </form> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--=====  End of single product tab  ======--> 
  <!--=============================================
    =            related product slider         =
    =============================================--> 
  <div class="related-product-area mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12 mb-40"> 
      <div class="section-title"> 
       <h2 class="mb-0">Related <span>Products</span></h2> 
      </div> 
     </div> 
    </div> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <!--=======  top selling product slider container  =======--> 
      <div class="ptk-slider related-product-slider-container"> 
       <div class="col"> 
        <!--=======  single product  =======--> 
        <div class="ptk-product"> 
         <div class="image"> 
          <a href="single-product.html"> <img src="/static/home/assets/images/products/product01.jpg" class="img-fluid" alt="" /> </a> 
          <!--=======  hover icons  =======--> 
          <a class="hover-icon" href="#" data-toggle="modal" data-target="#quick-view-modal-container"><i class="lnr lnr-eye"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-heart"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-cart"></i></a> 
          <!--=======  End of hover icons  =======--> 
          <!--=======  badge  =======--> 
          <div class="product-badge"> 
           <span class="new-badge">NEW</span> 
           <span class="discount-badge">-8%</span> 
          </div> 
          <!--=======  End of badge  =======--> 
         </div> 
         <div class="content"> 
          <p class="product-title"><a href="single-product.html">Field Messenger</a></p> 
          <p class="product-price"> <span class="main-price discounted">$75.90</span> <span class="discounted-price">$69.83</span> </p> 
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
       <div class="col"> 
        <!--=======  single product  =======--> 
        <div class="ptk-product"> 
         <div class="image"> 
          <a href="single-product.html"> <img src="/static/home/assets/images/products/product02.jpg" class="img-fluid" alt="" /> </a> 
          <!--=======  hover icons  =======--> 
          <a class="hover-icon" href="#" data-toggle="modal" data-target="#quick-view-modal-container"><i class="lnr lnr-eye"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-heart"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-cart"></i></a> 
          <!--=======  End of hover icons  =======--> 
          <!--=======  badge  =======--> 
          <div class="product-badge"> 
           <span class="new-badge">NEW</span> 
          </div> 
          <!--=======  End of badge  =======--> 
         </div> 
         <div class="content"> 
          <p class="product-title"><a href="single-product.html">Teton Pullover Hoo</a></p> 
          <p class="product-price"> <span class="main-price">$75.90</span> </p> 
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
       <div class="col"> 
        <!--=======  single product  =======--> 
        <div class="ptk-product"> 
         <div class="image"> 
          <a href="single-product.html"> <img src="/static/home/assets/images/products/product03.jpg" class="img-fluid" alt="" /> </a> 
          <!--=======  hover icons  =======--> 
          <a class="hover-icon" href="#" data-toggle="modal" data-target="#quick-view-modal-container"><i class="lnr lnr-eye"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-heart"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-cart"></i></a> 
          <!--=======  End of hover icons  =======--> 
          <!--=======  badge  =======--> 
          <div class="product-badge"> 
           <span class="new-badge">NEW</span> 
           <span class="discount-badge">-8%</span> 
          </div> 
          <!--=======  End of badge  =======--> 
         </div> 
         <div class="content"> 
          <p class="product-title"><a href="single-product.html">Hummingbird printed t-shirt</a></p> 
          <p class="product-price"> <span class="main-price discounted">$75.90</span> <span class="discounted-price">$69.83</span> </p> 
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
       <div class="col"> 
        <!--=======  single product  =======--> 
        <div class="ptk-product"> 
         <div class="image"> 
          <a href="single-product.html"> <img src="/static/home/assets/images/products/product04.jpg" class="img-fluid" alt="" /> </a> 
          <!--=======  hover icons  =======--> 
          <a class="hover-icon" href="#" data-toggle="modal" data-target="#quick-view-modal-container"><i class="lnr lnr-eye"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-heart"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-cart"></i></a> 
          <!--=======  End of hover icons  =======--> 
          <!--=======  badge  =======--> 
          <div class="product-badge"> 
           <span class="new-badge">NEW</span> 
           <span class="discount-badge">-8%</span> 
          </div> 
          <!--=======  End of badge  =======--> 
         </div> 
         <div class="content"> 
          <p class="product-title"><a href="single-product.html">Aim Analog</a></p> 
          <p class="product-price"> <span class="main-price discounted">$75.90</span> <span class="discounted-price">$69.83</span> </p> 
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
       <div class="col"> 
        <!--=======  single product  =======--> 
        <div class="ptk-product"> 
         <div class="image"> 
          <a href="single-product.html"> <img src="/static/home/assets/images/products/product05.jpg" class="img-fluid" alt="" /> </a> 
          <!--=======  hover icons  =======--> 
          <a class="hover-icon" href="#" data-toggle="modal" data-target="#quick-view-modal-container"><i class="lnr lnr-eye"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-heart"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-cart"></i></a> 
          <!--=======  End of hover icons  =======--> 
          <!--=======  badge  =======--> 
          <div class="product-badge"> 
          </div> 
          <!--=======  End of badge  =======--> 
         </div> 
         <div class="content"> 
          <p class="product-title"><a href="single-product.html">Mug Today is a good day</a></p> 
          <p class="product-price"> <span class="main-price discounted">$75.90</span> <span class="discounted-price">$69.83</span> </p> 
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
      </div> 
      <!--=======  End of top selling product slider container  =======--> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--=====  End of related product slider  ======--> 
 </body>
</html>
@endsection
@section('title','灯饰人生')