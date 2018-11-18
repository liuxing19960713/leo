@extends("Home.HomePublic.publics")
@section('home')

    <!-- =            Breadcrumb Area         = -->

    <div class="breadcrumb-area breadcrumb-bg pt-85 pb-85 mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="index.html"></a> <span class="separator"></span></li>
                            <li class="active"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of Breadcrumb Area  ======-->


    <!--=============================================
  =            Checkout page content         =
  =============================================-->
  
  <div class="page-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <!-- Checkout Form s-->
                    <form action="#" class="checkout-form">
                        <div class="row row-40">
                            
                            <div class="col-lg-7 mb-20">
                                
                                <!-- Billing Address -->
                                <div id="billing-form" class="mb-40">
                                    <h4 class="checkout-title">新增地址</h4>
    
                                    <div class="row">
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>收件人：</label>
                                            <input type="text" placeholder="First Name">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>联系电话：</label>
                                            <input type="text" placeholder="Phone number">
                                        </div>
    
                                        <div class="col-12 mb-20">
                                            <label>Company Name</label>
                                            <input type="text" placeholder="Company Name">
                                        </div>
    
                                        <div class="col-12 mb-20">
                                            <label>Address*</label>
                                            <input type="text" placeholder="Address line 1">
                                            <input type="text" placeholder="Address line 2">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Country*</label>
                                            <select class="nice-select">
                                                <option>Bangladesh</option>
                                                <option>China</option>
                                                <option>country</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                            </select>
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Town/City*</label>
                                            <input type="text" placeholder="Town/City">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>State*</label>
                                            <input type="text" placeholder="State">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Zip Code*</label>
                                            <input type="text" placeholder="Zip Code">
                                        </div>
    
                                        <div class="col-12 mb-20">
                                            <div class="check-box">
                                                <input type="checkbox" id="create_account">
                                                <label for="create_account">Create an Acount?</label>
                                            </div>
                                            <div class="check-box">
                                                <input type="checkbox" id="shiping_address" data-shipping>
                                                <label for="shiping_address">Ship to Different Address</label>
                                            </div>
                                        </div>
    
                                    </div>
    
                                </div>
                                
                                <!-- Shipping Address -->
                                <div id="shipping-form" class="mb-40">
                                    <h4 class="checkout-title">Shipping Address</h4>
    
                                    <div class="row">
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>First Name*</label>
                                            <input type="text" placeholder="First Name">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Last Name*</label>
                                            <input type="text" placeholder="Last Name">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Email Address*</label>
                                            <input type="email" placeholder="Email Address">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Phone no*</label>
                                            <input type="text" placeholder="Phone number">
                                        </div>
    
                                        <div class="col-12 mb-20">
                                            <label>Company Name</label>
                                            <input type="text" placeholder="Company Name">
                                        </div>
    
                                        <div class="col-12 mb-20">
                                            <label>Address*</label>
                                            <input type="text" placeholder="Address line 1">
                                            <input type="text" placeholder="Address line 2">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Country*</label>
                                            <select class="nice-select">
                                                <option>Bangladesh</option>
                                                <option>China</option>
                                                <option>country</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                            </select>
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Town/City*</label>
                                            <input type="text" placeholder="Town/City">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>State*</label>
                                            <input type="text" placeholder="State">
                                        </div>
    
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Zip Code*</label>
                                            <input type="text" placeholder="Zip Code">
                                        </div>
    
                                    </div>
    
                                </div>
                                
                            </div>
                            
                            
                            
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of Checkout page content  ======-->


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
                <h3 class="footer-title">Products & Sales</h3>
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
                    <input type="email" placeholder="Your email address">
                    <button type="submit" value="submit"><i class="lnr lnr-envelope"></i></button>
                  </form>
                </div>
                <!-- mailchimp-alerts Start -->
                <div class="mailchimp-alerts mb-20">
                  <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                  <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                  <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                </div><!-- mailchimp-alerts end -->
              
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
                <li><a href="#">About Us</a> <span class="separator">|</span></li>
                <li><a href="#">Blog</a> <span class="separator">|</span></li>
                <li><a href="#">My Account</a> <span class="separator">-</span></li>
                <li><a href="#">Order Status</a> <span class="separator">-</span></li>
                <li><a href="#">Shipping &amp; Returns</a> <span class="separator">-</span></li>
                <li><a href="#">Privacy Policy</a> <span class="separator">-</span></li>
                <li><a href="#">Terms &amp; Conditions</a></li>
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


  <!-- scroll to top  -->
  <a href="#" class="scroll-top"></a>
  <!-- end of scroll to top -->

@endsection
@section('title','灯饰人生')