@extends("Home.HomePublic.publics")
@section('home')
  <div class="blog-single-post-container mb-80"> 
   <!--=======  post title  =======--> 
   <h3 class="post-title">{{$info->title}}</h3> 
   <!--=======  End of post title  =======--> 
   <!--=======  Post meta  =======--> 
   <div class="post-meta"> 
    <p><span><i class="fa fa-user-circle"></i> Posted By: </span> <span class="separator">/</span> <span><i class="fa fa-calendar"></i> Posted On: <a href="#">{{$info->created_at}}</a></span></p> 
   </div> 
   <!--=======  End of Post meta  =======--> 
   <!--=======  Post media  =======--> 
  
   <!--=======  End of Post media  =======--> 
   <!--=======  Post content  =======--> 
   <div class="post-content mb-40"  style="text-align: center;"> 
     
    <p>{!!$info->content!!}</p> 
   </div> 
   <!--=======  End of Post content  =======--> 
   <!--=======  Tags area  =======--> 
   <div class="tag-area mb-40"> 
    <span>Tags: </span> 
    <ul> 
     <li><a href="/mypersonal">返回个人中心</a>,</li> 
     <li><a href="#">Furniture</a></li> 
    </ul> 
   </div> 
   <!--=======  End of Tags area  =======--> 
   <!--=======  Share post area  =======--> 
   <div class="social-share-buttons mb-40"> 
    <h3>share this post</h3> 
    <ul> 
     <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
     <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li> 
     <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li> 
     <li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li> 
     <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li> 
    </ul> 
   </div> 
   <!--=====  End of Share post area  ======--> 
   <!--=======  related post  =======--> 
   
   <!--=======  End of related post  =======--> 
  </div>
@endsection
@section('title','灯饰人生')