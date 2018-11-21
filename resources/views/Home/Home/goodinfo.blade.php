@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
<style>
/*.a{width: 200px;height: 100px;}*/
.stamp {width: 260px;height: 120px;padding: 0 10px;position: relative;overflow: hidden;}
.stamp:before {content: '';position: absolute;top:0;bottom:0;left:10px;right:10px;z-index: -1;}
.stamp:after {content: '';position: absolute;left: 10px;top: 10px;right: 10px;bottom: 10px;box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.5);z-index: -2;}
.stamp i{position: absolute;left: 25%;top: 45px;height: 200px;width: 270px;background-color: rgba(255,255,255,.15);transform: rotate(-30deg);}
.stamp .par{float: left;padding-left: 8px;width: 110px;border-right:2px dashed rgba(255,255,255,.3);text-align: left;margin-right: 7px;padding-right: 10px;}
.stamp .par p{color:#fff;}
.stamp .par span{font-size: 15px;color:#fff;margin-right: 5px;}
.stamp .par .sign{font-size: 13px;}
.stamp .par sub{position: relative;top:-5px;color:rgba(255,255,255,.8);}
.stamp .copy{display: inline-block;padding:10px 10px;width:100px;vertical-align: text-bottom;font-size: 17px;color:rgb(255,255,255);margin: 0;width: 120px;}
.stamp .copy p{font-size: 16px;margin-top: 4px;}
.stamp p{font-size: 15px;margin-top:5px;}
/*上面是公共的*/

/*第一张*/
.stamp01{background: #F39B00;background: radial-gradient(rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 5px, #F39B00 5px);
  /*background-size: 15px 15px;*/
  cursor: pointer;
  background-position: 9px 3px;}
.stamp01:before{background-color:#F39B00;}

/*蓝色*/
.stamp04{width: 260px;background: #50ADD3;background: radial-gradient(rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 4px, #50ADD3 4px);background-size: 12px 8px;background-position: -5px 10px;}
.stamp04:before{background-color:#50ADD3;left: 5px;right: 5px;}
.stamp04 .copy{padding: 10px 6px 10px 12px;font-size: 17px;}
.stamp04 .copy p{font-size: 16px;margin-top: 5px;margin-bottom: 8px;}

/*灰色*/
.stamp03{background: #808080;background: radial-gradient(rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 5px, #808080 5px);/*background-size: 15px 15px*/;background-position: 9px 3px;}
.stamp03:before{background-color:#808080;}
  </style>
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
        @foreach($pic as $key=> $r)
        @if($key==0)
        <div class="tab-pane fade show active" id="single-slide-{{$key}}" role="tabpanel" aria-labelledby="single-slide-tab-{{$key}}">
        @else
        <div class="tab-pane fade" id="single-slide-{{$key}}" role="tabpanel" aria-labelledby="single-slide-tab-{{$key}}">
        @endif
         <!--Single Product Image Start--> 
         <div class="single-product-img img-full"> 
          <img src="/static/admin/uploads/goods/{{$r}}" class="img-fluid" alt="" /> 
          <a href="/static/admin/uploads/goods/{{$r}}" class="big-image-popup"><i class="fa fa-search-plus"></i></a> 
         </div> 
         <!--Single Product Image End--> 
        </div>
        @endforeach
        
       

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
      <input type="hidden" name="val" value="{{$info->id}}">
       <p class="product-title mb-15">{{$info->goods_name}}</p> 
       <div class="rating d-inline-block mb-15"> 
        <i class="lnr lnr-star active"></i> 
        <i class="lnr lnr-star active"></i> 
        <i class="lnr lnr-star active"></i> 
        <i class="lnr lnr-star active"></i> 
        <i class="lnr lnr-star"></i> 
       </div> 
       <p class="review-links d-inline-block"> <a href="#"><i class="fa fa-comment-o"></i> 阅读评论 (1) </a> <a href="#"><i class="fa fa-pencil"></i> 写评论</a> </p> 
       <p class="product-price mb-30">  <span class="discounted-price">{{$info->price}}￥</span> </p> 
       <p class="product-description mb-15"> {{$info->desrc}}</p> 
       <form action="/hcart" method="post">
        {{csrf_field()}}
         

       <div class="cart-buttons mb-30"> 
        <p class="mb-15">数量</p> 
        <div class="pro-qty mr-10"> 
         <input type="text" value="1" class="cartnum" name="cartnum" /> 
        </div> 
        <input type="submit" value="添加到购物车" class="pataku-btn"> 
       </div> 
       </form>
       @if($cogoods==1)
       <p class="wishlist-link mb-30"><a gid="{{$info->id}}" href="javascript:void(0)" class="t"> 
        <i class="lnr lnr-heart "></i> 加入到愿望清单
       </a></p>
       
       @else
       <p class="wishlist-link mb-30"><a gid="{{$info->id}}" href="javascript:void(0)" class="t"> <i class="fa fa-heart "></i> 已加入到愿望清单</a></p>
       @endif
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
          @foreach($discount as $row)
          @if(in_array($row->id,$dlogs))
        <!--  <a href="javascript:void(0)" class="a">{{$row->id}}</a>
          -->
        <a class="quanok" style="float:left;display:inline-block;margin:10px;">
          <div class="stamp stamp03" >
          <input type="hidden" name="val" value="{{$row->id}}">
          <div class="par" style="margin-top:20px"><p>灯饰人生</p><sub class="sign">￥</sub><span>{{$row->minus}}</span><sub>优惠券</sub><p>订单满{{$row->max}}元</p></div>
         <!--  <div class="copy" style="margin-top:20px">领券<p><br><span>{{($row->start_time)}}</span><span>{{$row->end_time}}</span></p></div> -->
        <div class="copy" style="margin-top:20px">领劵<p>{{date('Y-m-d',time($row->start_time))}}<br>{{date('Y-m-d',time($row->end_time))}}</p></div>
          <i></i>
          </div>
        </a>
        
          @else
        <a class="quan" style="float:left;display:inline-block;margin:10px;">
          <div class="stamp stamp01" >
          <input type="hidden" name="val" value="{{$row->id}}">
          <div class="par" style="margin-top:20px"><p>灯饰人生</p><sub class="sign">￥</sub><span>{{$row->minus}}</span><sub>优惠券</sub><p>订单满{{$row->max}}元</p></div>
          <div class="copy" style="margin-top:20px">领券<p>{{date('Y-m-d',time($row->start_time))}}<br>{{date('Y-m-d',time($row->end_time))}}</p></div>
          <i></i>
          </div>
        </a>
       
        @endif
          @endforeach
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
       <h2 class="mb-0">相关商品</h2> 
      </div> 
     </div> 
    </div> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <!--=======  top selling product slider container  =======--> 
      <div class="ptk-slider related-product-slider-container">
      @foreach($data as $g)
       <div class="col"> 
        <!--=======  single product  =======--> 
        <div class="ptk-product"> 
         <div class="image"> 
          <a href="#"> <img src="/static/admin/uploads/z_goods/{{$g->z_pic}}" class="img-fluid" alt="" /> </a> 
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
          <p class="product-title" style="display: block;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width:100%;"><a href="single-product.html">{{$g->goods_name}}</a></p> 
          <p class="product-price"> <span class="discounted-price">￥{{$g->price}}</span> </p> 
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

      </div> 
      <!--=======  End of top selling product slider container  =======--> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--=====  End of related product slider  ======--> 
 </body>
 <script type="text/javascript">
 $(".t").bind('click',function(){
 //console.log(2);

// console.log($.session.get('hid'));
  id=$(this).attr('gid');
  // console.log(id);
 // return false;
 // console.log($(this).html());
 // return false;
 // 该次事件的 对象
  gg =$(this);
   $.ajax({
      url: '/cogoods',
      data: {id:id},

      
      // dataType: 'json',
      success: function(data){
        //console.log(typeof data);
        // 返回的是字符串，就是因为加了两行空行
       //console.log(data);
        data = data.replace(/\s/g, '');
        var ob = JSON.parse(data);//将json的字符串解析为对象
        // console.log(ob);

        if(ob.msg==0){
          alert('已取消收藏');
         gg.html('<i class="lnr lnr-heart "></i> 加入到愿望清单');
        }else if(ob.msg==1){
          alert('取消收藏失败');
         

         
        }else if(ob.msg==2){
          alert('添加收藏成功');
         gg.html('<i class="fa fa-heart "></i> 已加入到愿望清单');
        }else if(ob.msg==3){
          alert('添加收藏失败');
        }else if(ob.msg==4){
          //console.log(5);
          alert('请先登录');
          $(location).attr('href','/hlogin');
          
        }

        
      },
      error: function(res) {
        // alert('请先登录');
            // 
            // return true;
            
        
      }
    

    });

});
//alert(1);
$('.quan').on('click',function(){
  if ($(this).attr('disabled') === undefined) {
    // 获取当前a标签对象
    a = $(this);
    
    // 获取当前div对象
    divs = $(this).find('div:first');
    // alert(div);
    // 获取当前id
    id = $(this).find('input:first').val();
    // alert(id);
    
    
    $.ajax({
      url: '/discounta',
      data: {id:id},
      // dataType: 'json',
      success: function(data){
        // console.log(typeof data);
        // 返回的是字符串，就是因为加了两行空行
        data = data.replace(/\s/g, '');
        var obj = JSON.parse(data);
        // console.log(obj.msg);
        
        if (obj.msg == 1) {
          // alert(obj.msg);
          //变换a标签的className
          a.off();
          alert('领券成功!');
          a.attr('class','quanok');
          a.attr('disabled','true');
          a.attr('datahref',a.attr("href"));
          a.removeAttr('href');
          divs.attr('class','stamp stamp03');
          // return false;
        } else if(obj.msg == 2) {
            
        }else if(obj.msg == 3){
            alert('你已领取');
        }else{
            alert('发生数据错误');
        }
      },
      error: function(res) {
        console.log('res');
        alert('请先登录');
            // 这里要修改路径
            $(location).attr('href','/hlogin');
      }
    });
  }
});


 </script>
</html>
@endsection
@section('title','灯饰人生')