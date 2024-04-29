<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title')</title>
    <meta name="title" content="@yield('meta_title')">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    <meta property="og:title" content="@yield('meta_title')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:image" @yield('meta_image') />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_GB" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="@yield('meta_description')" />
    <meta name="twitter:title" content="@yield('meta_title')" />
    <meta name="twitter:image" @yield('meta_image') />
  
  
  
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="{{asset('vendor/slick/slick.css')}}">
     <link rel="stylesheet" href="{{asset('vendor/slick/slick-theme.css')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="icon" type="image/png" href="/images/logo.png"/> 
    <!-- Styles -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/owl-carousel/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/slick/slick.css')}}">
      <link rel="stylesheet" href="{{asset('vendor/slick/slick-theme.css')}}">
      <link rel="stylesheet" type="text/css" href="https://unpkg.com/xzoom/dist/xzoom.css" media="all" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" media="all" />-->
       
        <link rel="stylesheet" type="text/css" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" media="all" />
         <link rel="stylesheet" type="text/css" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" media="all" />
         <!--  <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all" />-->
        
    @yield('CSS')
    
    <!-- Scripts -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('vendor/slick/slick.js')}}"></script>
    <script src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
 <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
 
    
    
   
      <script>
         jQuery(document).ready(function(){
           jQuery('.product-slider').slick({
             dots: true,
             infinite: true,
             centerMode: true,
             centerPadding: '150px',
             autoplay: true,
             autoplaySpeed: 1000,
             slidesToShow: 3,
             slidesToScroll: 3,
             responsive: [
               {
                 breakpoint: 1023,
                 settings: {
                   arrows: true,
                   centerMode: true,
                   centerPadding: '40px',
                   slidesToShow: 3
                 }
               },
               {
                 breakpoint: 768,
                 settings: {
                   arrows: true,
                   centerMode: true,
                   centerPadding: '40px',
                   slidesToShow: 3
                 }
               },
               {
                 breakpoint: 480,
                 settings: {
                   arrows: true,
                   centerMode: true,
                   centerPadding: '40px',
                   slidesToShow: 1
                 }
               }
             ]
           });
         });
      </script>
      <script type="text/javascript">

    jQuery(document).ready(function() {

      jQuery(".btn-success").click(function(){ 
          var html = $(".clone").html();
          jQuery(".increment").after(html);
      });

      jQuery("body").on("click",".btn-danger",function(){ 
         jQuery(this).parents(".control-group").remove();
      });

    });

</script>

      <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<script type="text/javascript" src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script>
  jQuery(function($) {
      jQuery(".xzoom").xzoom({
          position: 'right',
          Xoffset: 15
      });
  });
</script>
<script>
function myFunction() {
  var x = document.getElementById("img_cat");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script type="text/javascript">

jQuery(function () {

jQuery('.closes').click(function () {

jQuery('#img_cat').addClass('remove');

});

jQuery('.show_img').click(function () {

jQuery('#img_cat').removeClass('remove');

});

});

</script>



</head>
<body>
    <div class="wrapper"> 
        <div class="page-wrapper">
            <!--/HEADER-->
                <header>
					<div class="row top-header top-bar">
						 <div class="top-bar-add-left">
                        <marquee><i class="fa fa-map-marker" aria-hidden="true"></i>Plot No.-127, 1st Floor, Industrial Area, Phase - 1, Panchkula, Haryana 134113</marquee>
                    </div>
                    <div class="top-bar-right">

                        <p>Follow Us: </p>
                        <P><a href="#" target="_blank"><img alt="godase" src="/images/ic_facebook_topbar.png"></a>
                        </p>
                        <P><a href="#" target="_blank"><img alt="godase" src="/images/ic_pinterest_topbar.png"></a>
                        </p>
                        <P><a href="#" target="_blank"><img alt="godase" src="/images/ic_twitter_topbar.png"></a>
                        </p>
                        <P><a href="#" target="_blank"><img alt="godase" src="/images/ic_linkedin_topbar.png"></a>
                        </p>
                        <P><a href="tel:+91 7007095489" target="_blank"><i class="fa fa-phone"></i> 0172- 5061646 </a> 
                        </p>

                    </div>
					</div>
                    <div id="myHeader">
                        <div class="container bg-white">				
							<div class="row">	
								<div class="top-bar-centerleft col-md-6">
								
									<a class="logo-brand" href="/"><img alt="godase" src="/images/logo.png"></a>
								</div>
								<div class="top-bar-centerright col-md-6">

									<div class="top-bar-centeremail">
										<div class="top-email">
											<img alt="godase" src="/images/ic_timing.png">
										</div>
										<div class="tope-mail-contant">
											<h4>Working Hours</h4>
											</p>09:30 am To 06:30 pm Hours</p>

										</div>
									</div>

									<div class="top-bar-centeremail">
										<div class="top-email">
											<img alt="godase" src="/images/ic_contact.png">
										</div>
										<div class="tope-mail-contant">
											<h4>Contact Us</h4>
											<p><a href="tel:+91-9467755655" target="_blank">+91-9467755655</a></p>
											<p><a href="tel:+91 7007095489" target="_blank">+91 7007095489</a></p>

										</div>
									</div>
								
								</div>
							</div>
						
                        </div>
						<div class="top-Header">
						<div class="container bg-gray-dark">
							<div class="row ">
										
								<nav class="navbar navbar-expand-lg navbar-light ">									
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-icon"></span>
									</button>
									<div class="collapse navbar-collapse" id="navbarSupportedContent">
										<ul class="navbar-nav ml-auto">
											<li class="nav-item active">
												<a class="nav-link" href="/">Home  <span class="sr-only">(current)</span></a>
											</li>
											
											<li class="nav-item">
													<a class="nav-link" href="/about-us">About</a>
											</li>
											<li class="nav-item dropdown">
												<a class="nav-link dropdown" href="/pcd-franchise" id="navbarDropdown"  aria-haspopup="true" aria-expanded="false">
														PCD Franchise
													</a>
											</li>
											
											@if($prodcat)
												<li class="nav-item dropdown">
													<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														Products
													</a>
													<div class="dropdown-menu" aria-labelledby="navbarDropdown">
														@foreach ($prodcat as $item)
															<a class="dropdown-item" href="/{{ $item->slug }}">{{$item->name}}</a>
														@endforeach
													</div>
												</li>
											@else
												<li class="nav-item">
													<a class="nav-link" href="#">Products</a>
												</li>
											@endif
											
										<li class="nav-item">
													<a class="nav-link" href="/contact">Contact</a>
											
										</ul>
									</div>
									 <form class="form-inline my-2 my-lg-0" action="/search-product" method="GET">
									     @csrf
                                <div class="input-group">
                                    <div class="form-outline">
                                        <input type="search" name="query" id="form1" class="form-control" placeholder="Search Product Here">
                                    
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-search"></i>
                                    </button>
                                </div>

                            </form>
								</nav>
								</div>
							</div>	
							</div>
                    </div>
                </header>
<!--/banner-end--><!--/about-sec-start-->
            <!--/HEADER-end-->
            @yield('content')
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                            <div class="content">
                                <div class="brand"><a href="/"><img alt="godase" src="/images/logo.png" alt=""></a></div>
                                </p>
                                    {{Setting::getsettings('footer')}}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                            <div class="content quck">
                                <h5>Quick link</h5>
                                <ul>
                                    @if($aboutus)
                                        @foreach ($aboutus->pages as $item)
                                            <li><a href="/{{ $item->slug }}"><i class="fa fa-angle-double-right"></i> {{$item->name}}</a></li>
                                        @endforeach
                                    @endif
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                            <div class="content">
                                <h5>Support</h5>
                                <ul>
                                    <li><p class="footer-p"> <i class="fa fa-envelope" aria-hidden="true"></i><a href=" tel:{{Setting::getsettings('email')}}">  {{Setting::getsettings('email')}} </a>  </p></li>
                                    <li><p class="footer-p"><i class="fa fa-phone" aria-hidden="true"></i><a href=" tel:{{Setting::getsettings('contactno')}}">  {{Setting::getsettings('contactno')}} </a> </p></li>
                                    <li><p class="footer-p"> <i class="fa fa-map" aria-hidden="true"></i> {{Setting::getsettings('address')}} </p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                            <div class="content">
                                <h5>Follow us</h5>
                                <ul class="social">
                                    @if(Setting::getsettings('facebook'))
                                        <li><a href="{{ Setting::getsettings('facebook') }}" target="_blank">
                                            <i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                                        </li>
                                    @endif
                                    @if(Setting::getsettings('twitter'))
                                        <li><a href="{{ Setting::getsettings('twitter') }}" target="_blank">
                                            <i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                        </li>
                                    @endif
                                    @if(Setting::getsettings('instagram'))
                                        <li><a href="{{ Setting::getsettings('instagram') }}" target="_blank">
                                            <i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                                        </li>
                                    @endif
                                    @if(Setting::getsettings('youtube'))
                                        <li><a href="{{ Setting::getsettings('youtube') }}" target="_blank">
                                            <i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
                                        </li>
                                    @endif
                                    @if(Setting::getsettings('linkedin'))
                                        <li><a href="{{ Setting::getsettings('linkedin') }}" target="_blank">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i> Linked In</a>
                                        </li>
                                    @endif
                                    
                                    <li><a href="" target="_blank"><img alt="godase" src="/images/facebook1.png" alt=""></a></li>
<li><a href="" target="_blank"><img alt="godase" src="/images/linkedin.png"></a></li>
<li><a href="" target="_blank"><img alt="godase" src="/images/pinterest.png" ></a></li>
<li><a href="" target="_blank"><img alt="godase" src="/images/twitter1.png" ></a></li>
<li><a href="" target="_blank"><img alt="godase" src="/images/instagram.png" ></a></li>
<li><a href="" target="_blank"><img alt="godase" src="/images/youtube.png" ></a></li>
<li><a href="" target="_blank"><img alt="godase" src="/images/logo50.png"></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="copy_bot">
                <div class="container">
            <div class="row">

                <div class="copyright">
                    <p style="color:#fff;">Copyright @ 2021 Godase Healthcare Pvt Ltd All rights reserved.<a style="color:#fff;"
                    href="https://www.webhopers.com/web-development-company-india" target="_blank"> || Web Development
                    and Designing </a> By <a style="text-decoration:none;" href="https://www.webhopers.com"
                    target="_blank"><b style="color: #126cdc;">Web</b><b style="color: #ff7713;">Hopers</b></a>.</p>

                    </div>
                    </div>
                    </div>
                    </section>
                
                
                
                <div class="footer-form">
    <span class="heading-look" id="mini_contact_form_container"> PLACE A QUERY</span>
     <div class="fo-form" id="mini_contact_form" style="display: none;">
        <div class="col-md-12 contact-form">
            <div data-aos="fade-left" data-aos-duration="2000">
                <form action="{{ url('/enquiry/store') }}" method="post">
                    <div class="form-group row">
                        <div class="col-md-12"><input class="form-control" id="name" name="name"
                                placeholder="Name*" required="" type="text" /></div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-12"><input class="form-control" id="email" name="email"
                                placeholder="Email*" required="" type="text" /></div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12"><input class="form-control" id="phone" name="phone"
                                placeholder="Phone no*" required="" type="text" /></div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12"><input class="form-control" id="location" name="location"
                                placeholder="Location*" required="" type="text" /></div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12"><textarea class="form-control" name="message"
                                placeholder="Message*" required=""></textarea></div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-center"><button class="btn btn-outline-info text-center"
                                type="submit">Submit Enquiry</button></div>
                    </div>
                </form>
            </div>
        </div>
        </div>
        </div>
        
        
        
    <div class="cta-bottom">
         <ul>
            <li class="call-foo">
               <a href="tel:+91-9467755655" onclick="ga('create',''); ga('send', 'event', 'category-phone-call', 'action-phone-call', 'label-phone-call', 1);">
                  <p><i class="fa fa-phone"></i>  </p>
               </a>
            </li>
            <li class="whatsapp-foo">
               <a href="https://api.whatsapp.com/send?phone=+919467755655 &amp;text=Hello, I need some informations." class="whatsapp" onclick="ga('create',''); ga('send', 'event', 'category-whatsapp', 'action-whatsapp', 'label-whatsapp', 1);">
                  <p><i class="fa fa-whatsapp"></i>  </p>
               </a>
            </li>
            <li id="clik_show" class="mail-foo">
               <p><i class="fa fa-envelope"></i> </p>
               <div class="fo-form" id="mini_contact_forms" style="">
                  <div class="container">
                     <p><span id="closes">X</span> </p>
                     <form action="/enquiry/store" method="post">
                        @csrf                     <div class="form-group row">
                           <div class="col-md-12">
                              <input id="name" type="text" class="form-control" name="name" placeholder="Name*" required="">
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-12">
                              <input id="email" type="email" class="form-control" name="email" placeholder="Email*" required="">
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-12">
                              <input id="phone" type="text" class="form-control" name="phone" placeholder="Phone no*" required="">
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-12">
                              <input id="location" type="text" class="form-control" name="location" placeholder="Location*" required="">
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-md-12">
                              <textarea class="form-control" name="message" placeholder="Message*" required=""></textarea>
                           </div>
                        </div>
                        <div class="form-group row mb-0">
                           <div class="col-md-12">
                              <button type="submit" class="btn btn-outline-info">
                              Submit Enquiry
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </li>
         </ul>
      </div>    
        
        
        
        <script>
jQuery(document).ready(function(){

  jQuery("#mini_contact_form_container").click(function(){
	jQuery("#mini_contact_form").slideToggle(1500);
  });

});

</script>
            
            <script>
         jQuery(document).ready(function($){
           jQuery("#clik_show").click(function(){
         jQuery("#mini_contact_forms").show()
         });
         
         
         jQuery('#closes').click(function(){
         jQuery("#mini_contact_forms").addClass("hide");
         });
         
         });
      </script>    
                <script>  
             $(document).ready(function(){
    // Set div display to none
    $(".show_im").click(function(){
        $(".hide_im").css("display", "block");
    });
    
    // Set div display to block
    $(".show-btn").click(function(){
        $(".hide_im").css("display", "none");
    });
});
</script>   
                
          <script>
    $('div a').click(function(e) {
        $('#myModal img').attr('src', $(this).attr('data-img-url')); 
    });
</script> 
<script>
    $('div a').click(function(e) {
        $('#myModals img').attr('src', $(this).attr('data-img-url')); 
    });
</script> 
             
                
                
            </footer>
            
            
            <div class="side-icon">
                <div>
                <a href="tel:+919467755655" target="_blank" class="phone-icon"><img alt="godase" src="/images/call_ico.png" alt=""></a> </div>
                <div><a target="_blank" href="https://api.whatsapp.com/send?phone=+91 9467755655,&text=Hello,I need some information" class="whatsapp-icon"><img src="/images/whatsapp.png" alt=""></a> </div>
                 
            </div>
            <div class="side-icon2">
                <li class="li-mail"><a target="_blank" href="mailto:godasehealthcare@gmail.com"><i class="fa fa-envelope"></i></a></li>
                <li class="li-pdf"><a target="_blank" href=""><i class="fa fa-file-pdf-o"></i></a></li>
            </div>
        </div>
    </div>
    @yield('modal')
</body>
    <!-- Scripts -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>-->
    <?php 
        //echo html_entity_decode(Setting::getsettings('js'));
    ?>
    <!--<script src="/vendor/owl-carousel/owl.carousel.js"></script>-->
    <!--<script>-->
    <!--    $(document).ready(function() {-->
    <!--        $("#owl-demo").owlCarousel({-->
    <!--            autoPlay: 3000,-->
    <!--            items : 4,-->
    <!--            itemsDesktop : [1199,3],-->
    <!--            itemsDesktopSmall : [979,3]-->
    <!--        });-->
    <!--    });-->
    <!--</script>-->
        
    <!--<script>-->
    <!--    const input = document.getElementById("search-input");-->
    <!--    const searchBtn = document.getElementById("search-btn");-->
        
    <!--    const expand = () => {-->
    <!--        searchBtn.classList.toggle("close");-->
    <!--        input.classList.toggle("square");-->
    <!--    };-->
        
    <!--    searchBtn.addEventListener("click", expand);-->
    <!--</script>-->
    
    <!--<script>-->
    <!--    window.onscroll = function() {myFunction()};-->
        
    <!--    var header = document.getElementById("myHeader");-->
    <!--    var sticky = header.offsetTop;-->
        
    <!--    function myFunction() {-->
    <!--        if (window.pageYOffset > sticky) {-->
    <!--            header.classList.add("sticky");-->
    <!--        } else {-->
    <!--            header.classList.remove("sticky");-->
    <!--        }-->
    <!--    }-->
    <!--</script>-->
    <script>
  AOS.init();
</script>
    @yield('JS')
</html>
