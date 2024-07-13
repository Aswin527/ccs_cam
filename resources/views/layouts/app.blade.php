<?php $setting = DB::table('settings')->where('id',1)->first();?>
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
      
     <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&amp;display=swap" rel="stylesheet">


    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="/assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="/assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="/assets/vendors/jarallax/jarallax.css" />
    <link rel="stylesheet" href="/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="/assets/vendors/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="/assets/vendors/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="/assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="/assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="/assets/vendors/oxpins-icons/style.css">
    <link rel="stylesheet" href="/assets/vendors/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="/assets/vendors/reey-font/stylesheet.css" />
    <link rel="stylesheet" href="/assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="/assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="/assets/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="/assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="/assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="/assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="/assets/vendors/timepicker/timePicker.css" />

    <link rel="stylesheet" href="/assets/css/oxpins.css" />
    <link rel="stylesheet" href="/assets/css/oxpins-responsive.css" />
     @yield("css")
   



 </head>

 <body class="custom-cursor">
 <div class="page-wrapper">

 <header class="main-header">
    <nav class="main-menu">
        <div class="top-ribbon">
            <div class="top-ribbon__left">
                <div class="main-menu__right-top-address">
                    <ul class="list-unstyled main-menu__right-top-address-list">
                        <li>
                            <div class="icon">
                                <span class="icon-phone-call"></span>
                            </div>
                            <div class="content">
                                <p>Helpline</p>
                                <h5><a href="#">{{$setting->phone}} </a></h5>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-message"></span>
                            </div>
                            <div class="content">
                                <p>Send email</p>
                                <h5><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></h5>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-location"></span>
                            </div>
                            <div class="content">
                                <p>Address</p>
                                <h5>{{$setting->address}}</h5>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="top-ribbon__right-top">
                <div class="login_btn_div">  
                    <a href="/login" class="login_btn">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                </div>
                <div class="donation_btn_div">
                    <a href="/donation_request" class="login_btn">Donate Now</a>
                </div>
            </div>
        </div>
        <div class="main-menu__wrapper">
                <div class="main-menu__left">
                    <div class="main-menu__logo">
                        <a href="/"><img src="/assets/images/ccs-small-logo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="main-menu__right">
                    <div class="main-menu__toggler">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="main-menu__right-bottom">
                        <div class="main-menu__main-menu-box">
                            <ul class="main-menu__list">
                                <li><a href="/">Home</a></li>
                                <li><a href="/about-us">About</a></li>
                                <li><a href="/publications">Publications</a></li>
                                <li><a href="/membership">Membership</a></li>
                                <li><a href="/all-events">Events</a></li>
                                <li><a href="/all-projects">Projects</a></li>
                                <li><a href="/our-partners">Our Partner</a></li>
                                <li><a href="/all-gallery">Gallery</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </nav>
</header>



     @yield('content')
     <footer class="site-footer">
            <div class="site-footer-bg" style="background-image: url(assets/images/bg-sm.jpeg);">
            </div>
            <div class="site-footer__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="footer-widget__column footer-widget__about">
                                <div class="footer-widget__about-logo">
                                    <a href="/"><img width="200px" src="/assets/images/logo.jpg" alt=""></a>
                                </div>
                                <div class="footer-widget__about-text-box">
                                    <p class="footer-widget__about-text">The Cambodian Chemical Society (CCS) envisions The Science of Chemistry and Chemists, Students and Researchers in Cambodia with advanced knowledge and 
                                    skills appropriate to the national requirements of research capacity</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                            <div class="footer-widget__column footer-widget__links clearfix">
                                <h3 class="footer-widget__title">Links</h3>
                                <ul class="footer-widget__links-list list-unstyled clearfix">
                                    <li><a href="/about-us">About us</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                    <li><a href="/membership">Membership</a></li>
                                    <li><a href="/all-events">Recent Events</a></li>
                                    <li><a href="/login">Login</a></li>
                                    <li><a href="/">Donations</a></li>
                                </ul>
                            </div>
                        </div>
                       
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="footer-widget__column footer-widget__contact">
                                <h3 class="footer-widget__title">Contact</h3>
                                <p class="footer-widget__contact-text">{{$setting->address}}
                                </p>
                                <ul class="list-unstyled footer-widget__contact-list">
                                    <li>
                                        <div class="icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="text">
                                            <p><a href="mailto:{{$setting->email}} ">{{$setting->email}}</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="text">
                                            <p>
                                                @foreach(explode(',', $setting->phone) as $phone)
                                                    <a href="tel:{{$phone}}">{{$phone}}</a><br>
                                                @endforeach
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="site-footer__social">
                                    <a href="https://www.youtube.com/@ccs-cambodiacambodianchemi2580"><i class="fab fa-youtube"></i></a>
                                    <a href="https://www.facebook.com/ccsphnompenh"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-telegram"></i></a>
                                    <!-- <a href="#"><i class="fab fa-instagram"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </footer>
 </div>  
 <script>
    document.querySelector('.mobile-nav__toggler').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('.main-menu__list').classList.toggle('active');
    });
</script>

     <script src="/assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendors/jarallax/jarallax.min.js"></script>
    <script src="/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="/assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="/assets/vendors/nouislider/nouislider.min.js"></script>
    <script src="/assets/vendors/odometer/odometer.min.js"></script>
    <script src="/assets/vendors/swiper/swiper.min.js"></script>
    <script src="/assets/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="/assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="/assets/vendors/wow/wow.js"></script>
    <script src="/assets/vendors/isotope/isotope.js"></script>
    <script src="/assets/vendors/countdown/countdown.min.js"></script>
    <script src="/assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="/assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="/assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="/assets/vendors/vegas/vegas.min.js"></script>
    <script src="/assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="/assets/vendors/timepicker/timePicker.js"></script>
    <script src="/assets/vendors/circleType/jquery.circleType.js"></script>
    <script src="/assets/vendors/circleType/jquery.lettering.min.js"></script>




    <!-- template js -->
    <script src="/assets/js/oxpins.js"></script>
    @yield('js')
 </body>

 </html>