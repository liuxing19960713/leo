@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <link href="/static/home/assets/css/bootstrap.min.css" rel="stylesheet">
 <body>
  <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <div class="breadcrumb-container"> 
       <ul> 
        <li><a href="index.html">Home</a> <span class="separator">/</span></li> 
        <li class="active">Blog</li> 
       </ul> 
      </div> 
     </div> 
  </div>
    </div> 
   </div> 
  <html>
 <head></head>
 <body>
  <div class="blog-page-container mb-80"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <!--=======  blog post container  =======--> 
      <div class="blog-post-container mb-15"> 
       <div class="row">
       @foreach($rows as $rowss)
        @if($rowss['status']==1)
        

        <div class="col-lg-4 col-md-6"> 
         <!--=======  single blog post  =======--> 
         <div class="single-blog-post mb-35"> 
          <div class="row"> 
           <div class="col-lg-12"> 
            <div class="single-blog-post-media mb-20"> 
             <div class="image"> 
              <a href="/articleshome/{{$rowss['id']}}"><img src="{{$rowss['thumb']['0']}}" class="img-fluid" alt="" /></a> 
             </div> 
            </div> 
           </div> 
           <div class="col-lg-12"> 
            <div class="single-blog-post-content"> 
             <h3 class="post-title"> <a href="/articleshome/{{$rowss['id']}}">{{$rowss['title']}}</a></h3>{{csrf_field()}} 
             <div class="post-meta"> 
              <p><span><i class="fa fa-user-circle"></i> </span> <a href="/articleshome/{{$rowss['id']}}">{{$rowss['name']}}</a> <span class="separator">/</span> <span><i class="fa fa-calendar"></i> <a href="#">24 August, 2018</a></span></p> 
             </div> 
             <p class="post-excerpt">{{$rowss['head']}}</p> 
             <a href="/articleshome/{{$rowss['id']}}" class="blog-readmore-btn">continue <i class="fa fa-long-arrow-right"></i></a> 
            </div> 
           </div> 
          </div> 
         </div> 
         <!--=======  End of single blog post  =======--> 
        </div>
          @endif
         @endforeach
         
         
         
        
         
       </div> 
      </div> 
      <!--=======  End of blog post container  =======--> 
      <!--=======  Pagination container  =======--> 
      <div class="pagination-container pb-20 mb-md-80 mb-sm-80"> 
       <div class="container"> 
        <div class="row"> 
         <div class="col-lg-12"> 
          <!--=======  pagination-content  =======--> 
          <div class="pagination-content text-center">
         {{$article->render()}}
           <ul> 
            <li><a href="#"><i class="fa fa-angle-left"></i> Previous</a></li> 
            <li><a class="active" href="#">1</a></li>       
            <li><a href="#">4</a></li> 
            <li><a href="#">Next <i class="fa fa-angle-right"></i> </a></li> 
           </ul> 
          </div> 
          <!--=======  End of pagination-content  =======--> 
         </div> 
        </div> 
       </div> 
      </div> 
      <!--=======  End of Pagination container  =======--> 
     </div> 
    </div> 
   </div> 
  </div>
 </body>
</html>
 </body>
</html>
@endsection
@section('title','灯饰人生')