@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
 <style type="text/css">
 	.font{color:red;}
 </style>
 <body>
  <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <div class="breadcrumb-container"> 
       <ul> 
        <li><a href="index.html">Home</a> <span class="separator">/</span></li> 
        <li><a href="shop-left-sidebar.html">Shop</a> <span class="separator">/</span></li> 
        <li class="active">Sofas &amp; Chairs</li> 
       </ul> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--=====  End of Breadcrumb Area  ======--> 
  <!--=============================================
    =            shop page content         =
    =============================================--> 
  <div class="shop-page-content mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <!--=======  shop header  =======--> 
      <div class="shop-header mb-20"> 
       <div class="row"> 
        <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-20 d-flex align-items-center"> 
         <!--=======  view mode  =======--> 
         <div class="view-mode-icons"> 
          <a href="#" data-target="grid"><i class="fa fa-th"></i></a> 
          <a class="active" href="#" data-target="list"><i class="fa fa-list"></i></a> 
         </div> 
         <p class="result-show-message">搜索到<span class="font">{{$search->Total()}}</span>件商品 共<span class="font">{{$search->LastPage()}}</span>页</p> 
         <!--=======  End of view mode  =======--> 
        </div> 
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-column flex-sm-row justify-content-start justify-content-md-end align-items-sm-center"> 
         <!--=======  Sort by dropdown  =======--> 
         <div class="sort-by-dropdown d-flex align-items-center mb-xs-10"> 
          <p class="mr-10 mb-0">排序方式: </p> 
          <select name="sort-by" id="sort-by" class="nice-select" onchange="check(this)" > <option value="0"><--请选择排序方式--></option><option value="asc">按价格排序: 从低到高</option> <option value="desc">按价格排序：从高到低</option> </select> 
         </div> 
         <!--=======  End of Sort by dropdown  =======--> 
        </div> 
       </div> 
      </div> 
      <!--=======  End of shop header  =======--> 
      <!--=======  shop product wrap   =======--> 
      <div class="shop-product-wrap list row"> 
       @foreach($se as $data)
       <!--遍历开始--> 
       <div class="col-lg-4 col-md-6 col-sm-6 col-12"> 
        <!--=======  grid view product  =======--> 
        <div class="ptk-product shop-grid-view-product">
        
         <div class="image"> 
          <a href="single-product.html"> <img src="/static/admin/uploads/z_goods/{{$data['z_pic']}}" class="img-fluid" alt="" /> </a> 
          <!--=======  hover icons  =======--> 
          <a class="hover-icon" href="#" data-toggle="modal" data-target="#quick-view-modal-container"><i class="lnr lnr-eye"></i></a> 
          <a class="hover-icon " href="#"><i class="lnr lnr-heart"></i></a> 
          <a class="hover-icon" href="#"><i class="lnr lnr-cart"></i></a> 
          <!--=======  End of hover icons  =======--> 
         </div> s
         <div class="content"> 
          <p class="product-title" style="display: block;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width:100%;"><a href="single-product.html">{{$data['goods_name']}}</a></p> 
          <p class="product-price">  <span class="discounted-price">￥{{$data['price']}}</span> </p> 
         </div> 
         <div class="rating"> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star active"></i> 
          <i class="lnr lnr-star"></i> 
         </div> 
        </div> 
        <!--=======  End of grid view product  =======--> 
        <!--=======  product list view  =======--> 
        <div class="ptk-product shop-list-view-product"> 
         <div class="image"> 
          <a href="/goodinfo/{{$data['id']}}"> <img src="/static/admin/uploads/z_goods/{{$data['z_pic']}}" class="img-fluid" alt="" /> </a> 
         </div> 
         <div class="content">

          <p class="product-title" style="display: block;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width:50%;"><a href="/goodinfo/{{$data['id']}}">{{$data['goods_name']}}</a></p> 
          <div class="rating "> 
           <i class="lnr lnr-star active"></i> 
           <i class="lnr lnr-star active"></i> 
           <i class="lnr lnr-star active"></i> 
           <i class="lnr lnr-star active"></i> 
           <i class="lnr lnr-star"></i> 
          </div> 
          <p class="product-price">  <span class="discounted-price">￥{{$data['price']}}</span> </p> 
          <p class="product-description">{{$data['desrc']}}</p> 
          <!--=======  hover icons  =======--> 
          <div class="hover-icons"> 
           <a class="hover-icon" href="#" data-toggle="modal" data-target="#quick-view-modal-container"><i class="lnr lnr-eye"></i></a>
           @if($data['status']==1) 
           <a gid="{{$data['id']}}" class="hover-icon t" href="javascript:void(0)"><i class="fa fa-heart" style="margin-top:12px;"></i></a>
          @else
          <a gid="{{$data['id']}}" class="hover-icon t" href="javascript:void(0)"><i class="lnr lnr-heart"></i></a>
          @endif
           <a class="hover-icon" href=""><i class="lnr lnr-cart"></i></a> 
          </div> 
          <!--=======  End of hover icons  =======--> 
         </div> 
        </div> 
        <!--=======  End of product list view  =======--> 
       </div>
       @endforeach  
       <!--遍历结束-->
      </div> 
      <!--=======  End of shop product wrap    =======--> 
      <!--=======  pagination  =======--> 
      <div class="pagination-container mt-50 pb-20 mb-md-80 mb-sm-80"> 
       <div class="row"> 
        <div class="col-lg-4 col-md-4 col-sm-12 text-center text-md-left mb-sm-20"> 
         <!--=======  showing result text  =======--> 
         
         <!--=======  End of showing result text  =======--> 
        </div> 
        <div class="col-lg-8 col-md-8 col-sm-12"> 
         
           <!-- 分页 -->
	      <div id="pull_right">
	       <div class="pull-right">
	          {{$search->render()}}
	       </div>
	      </div>
	     <!-- 分页结束  -->
         
         <!--=======  End of pagination-content  =======--> 
        </div> 
       </div> 
      </div> 
      <!--=======  End of pagination  =======--> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--=====  End of shop page content  ======--> 
 </body>
 <script type="text/javascript">
 $(".t").bind('click',function(){
 //console.log(2);


  id=$(this).attr('gid');
  console.log(id);
  gg =$(this);
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
          gg.html('<i class="lnr lnr-heart "></i>');
        }else if(ob.msg==1){
          alert('取消收藏失败');
         

         
        }else if(ob.msg==2){
          alert('添加收藏成功');
          gg.html('<i class="fa fa-heart" style="margin-top:12px;"></i>');
        }else if(ob.msg==3){
          alert('取消收藏失败')
        }else if(ob.msg==4){
          alert('请先登录');
          $(location).attr('href','/hlogin');
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