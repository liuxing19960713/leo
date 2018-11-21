@extends("Home.HomePublic.publics")
@section('home')
    <div class="container"> 
   <div class="row"> 
    <div class="col-lg-3 col-md-4 mb-sm-70"> 
     <!--=======  contact page side content  =======--> 
     <div class="contact-page-side-content"> 
      <h3 class="contact-page-title">Contact Us</h3> 
    
      <!--=======  End of single contact block  =======--> 
      <!--=======  single contact block  =======--> 
      <div class="single-contact-block"> 
       <h4><img src="/static/home/assets/images/icons/contact-icon2.png" alt="" /> Phone</h4> 
       <p>Mobile: (08) 123 456 789</p> 
       <p>Hotline: 1009 678 456</p> 
      </div> 
      <!--=======  End of single contact block  =======--> 
      <!--=======  single contact block  =======--> 
    <!--   <div class="single-contact-block"> 
       <h4><img src="/static/home/assets/images/icons/contact-icon3.png" alt="" /> Content</h4> 
       <p>yourmail@domain.com</p> 
       <p>support@hastech.company</p> 
      </div>  -->
      <!--=======  End of single contact block  =======--> 
     </div> 
     <!--=======  End of contact page side content  =======--> 
    </div> 
    <div class="col-lg-9 col-md-8 pl-100 pl-sm-15"> 
     <!--=======  contact form content  =======--> 
     <div class="contact-form-content"> 
      <h3 class="contact-page-title">Comment</h3> 
      <div class="contact-form"> 
       <form id="contact-form" action="/hcomment/{{$data['oid']}}" method="post"> 
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group"> 
         <label>Your Name <span class="required">*</span></label> 
         <input type="text" disabled value="{{$data['uname']}}" id="customername" required="" /> 
        </div> 
        
        <div class="form-group"> 
        <label for="source">评分:</label> 
              <select name="score" id="" style="width: 100px">
                <option value="2">--请选择--</option>
                <option value="1">差评</option>
                <option value="2">一般</option>
                <option value="3">好评</option>
                <option value="4">非常好</option>
              </select>
        </div> 
      <input type="hidden" name="gid" value="{{$data['gid']}}">
      <input type="hidden" name="uid" value="{{$data['uid']}}">
        <div class="form-group"> 
         <label>Your Message</label> 
         <textarea name="comment" id="contactMessage"></textarea> 
        </div> 
        <div class="form-group mb-0"> 
         <button type="submit" value="submit" id="submit" class="pataku-btn">send</button> 
        </div> 
       </form> 
      </div> 
      <p class="form-messege pt-10 pb-10 mt-10 mb-10"></p> 
     </div> 
     <!--=======  End of contact form content =======--> 
    </div> 
   </div> 
  </div>
@endsection
@section('title','灯饰人生')