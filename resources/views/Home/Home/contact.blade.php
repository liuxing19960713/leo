@extends("Home.HomePublic.publics")
@section('home')
<html>
 <head></head>
 <body>
  <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <div class="breadcrumb-container"> 
       <ul> 
        <li><a href="index.html">Home</a> <span class="separator">/</span></li> 
        <li class="active">Contact</li> 
       </ul> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 
  <!--=====  End of Breadcrumb Area  ======--> 
  <!--=============================================
  =            Contact page content         =
  =============================================--> 
  <div class="page-content mb-45"> 
   <!--=============================================
    =            google map container         =
    =============================================--> 
   <div class="google-map-container mb-80"> 
    <div id="google-map"><a href='http://api.map.baidu.com/geocoder?address=上海虹桥机场&output=html' target='_blank'> <img style="margin:2px" width="400" height="400" src="http://api.map.baidu.com/staticimage? 
        width=400&height=300&zoom=11&center=上海虹桥机场" />  
    </a></div> 
   </div> 
   <!--=====  End of google map container  ======--> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-3 col-md-4 mb-sm-70"> 
      <!--=======  contact page side content  =======--> 
      <div class="contact-page-side-content"> 
       <h3 class="contact-page-title">Contact Us</h3> 
       <!--=======  single contact block  =======--> 
       <div class="single-contact-block"> 
        <h4><img src="assets/images/icons/contact-icon1.png" alt="" /> Address</h4> 
        <p>123 Main Street, Anytown, CA 12345 – USA</p> 
       </div> 
       <!--=======  End of single contact block  =======--> 
       <!--=======  single contact block  =======--> 
       <div class="single-contact-block"> 
        <h4><img src="assets/images/icons/contact-icon2.png" alt="" /> Phone</h4> 
        <p>Mobile: (08) 123 456 789</p> 
        <p>Hotline: 1009 678 456</p> 
       </div> 
       <!--=======  End of single contact block  =======--> 
       <!--=======  single contact block  =======--> 
       <div class="single-contact-block"> 
        <h4><img src="assets/images/icons/contact-icon3.png" alt="" /> Email</h4> 
        <p>yourmail@domain.com</p> 
        <p>support@hastech.company</p> 
       </div> 
       <!--=======  End of single contact block  =======--> 
      </div> 
      <!--=======  End of contact page side content  =======--> 
     </div> 
     <div class="col-lg-9 col-md-8 pl-100 pl-sm-15"> 
      <!--=======  contact form content  =======--> 
      <div class="contact-form-content"> 
       <h3 class="contact-page-title">Tell Us Your Message</h3> 
       <div class="contact-form"> 
        <form id="contact-form" action="assets/php/mail.php" method="post"> 
         <div class="form-group"> 
          <label>Your Name <span class="required">*</span></label> 
          <input type="text" name="customerName" id="customername" required="" /> 
         </div> 
         <div class="form-group"> 
          <label>Your Email <span class="required">*</span></label> 
          <input type="email" name="customerEmail" id="customerEmail" required="" /> 
         </div> 
         <div class="form-group"> 
          <label>Subject</label> 
          <input type="text" name="contactSubject" id="contactSubject" /> 
         </div> 
         <div class="form-group"> 
          <label>Your Message</label> 
          <textarea name="contactMessage" id="contactMessage"></textarea> 
         </div> 
         <div class="form-group mb-0"> 
          <button type="submit" value="submit" id="submit" class="pataku-btn" name="submit">send</button> 
         </div> 
        </form> 
       </div> 
       <p class="form-messege pt-10 pb-10 mt-10 mb-10"></p> 
      </div> 
      <!--=======  End of contact form content =======--> 
     </div> 
    </div> 
   </div> 
  </div>
 </body>
</html>

@endsection
@section('title','灯饰人生')