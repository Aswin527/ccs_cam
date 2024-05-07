@extends('layouts.app')
@section('meta_title','')
@section('content')
<style>
@media screen and (max-width: 767px) {
   .main-slider__content {
     margin-left: 0px !important; 
}
.main-slider .container {
    position: relative;
    padding-top: 76px !important;
    padding-bottom: 0px !important;

}
.testimonial-one__text-2 {
    font-size: 14px !important;
   
    line-height: 23px !important;
    
}
}
   
</style>
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        <!--Main Slider Start-->
            <section class="main-slider clearfix">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
                <div class="swiper">
                
                <div class="swiper-wrapper">
                   @foreach($slider as $slider)
                    <div class="swiper-slide">
                        <div class="parallax-bg" style="background-image: url(images/{{$slider->image}});" data-swiper-parallax="-23%"></div>        
                    </div>
                   @endforeach
                   

                   

                </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                        <i class="icon-left-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                        <i class="icon-right-arrow"></i>
                    </div>
                </div>

            </div>
        </section>
        <!--Main Slider End-->
        
        
        
        
        <!--Events Page Start-->
            <section class="events-carousel-page">
            <div class="container">
                 <div class="section-title text-center">
                    <span class="section-title__tagline">News &amp; Events</span>
                   
                    </h2>
                </div>
                <div class="events-carousel thm-owl__carousel owl-theme owl-carousel carousel-dot-style"
                    data-owl-options='{
                    "items": 3,
                    "margin": 30,
                    "smartSpeed": 700,
                    "loop":true,
                    "autoplay": 6000,
                    "nav":false,
                    "dots":false,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive":{
                        "0":{
                            "items":1
                        },
                        "768":{
                            "items":2
                        },
                        "992":{
                            "items": 3
                        }
                    }
                }'>
                     @foreach($events as $events) 
                         <div class="item">
                        <!--Events One Single Start-->
                        <div class="events-one__single">
                            <div class="events-one__img">
                                 @if($events->image_event)
                                    <img src="/images/{{$events->image_event}}" alt="">
                                    @else
                                    <img src="/assets/images/resources/donations-list-img-1.jpg" alt="">
                                @endif
                                <!--<div class="events-one__date">-->
                                <!--    <p>{{$events->created_at}}</p>-->
                                <!--</div>-->
                                <div class="events-one__content">
                                    <ul class="list-unstyled events-one__meta">
                                       
                                        <li><i class="fas fa-map-marker-alt"></i>{{$events->location_event}}</li>
                                    </ul>
                                    <h3 class="events-one__title"><a href="/events/{{$events->id}}">{{$events->event_name}}</a></h3>
                                    <a href="/events/{{$events->id}}" class="view" target="_blink">View More Event</a>
                                </div>
                            </div>
                        </div>
                        <!--Events One Single End-->
                    </div>
                      @endforeach 
                </div>
                <div class="become-volunteer-one__btn-box tt">
                        <a href="/all-events" class="thm-btn become-volunteer-one__btn">View all events</a>
                    </div>
            </div>
        </section>
        <!--Events Page End-->
        
         <?php 
                                $category =  DB::table('categories')->where('status',1)->get(); 
                                ?>
        
         <!--Events Page Start-->
            <section class="events-carousel-page">
            <div class="container">
                 <div class="section-title text-center">
                    <span class="section-title__tagline">Publications</span>
                   
                    </h2>
                </div>
                <div class="events-carousel thm-owl__carousel owl-theme owl-carousel carousel-dot-style"
                    data-owl-options='{
                    "items": 3,
                    "margin": 30,
                    "smartSpeed": 700,
                    "loop":true,
                    "autoplay": 6000,
                    "nav":false,
                    "dots":false,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive":{
                        "0":{
                            "items":1
                        },
                        "768":{
                            "items":2
                        },
                        "992":{
                            "items": 3
                        }
                    }
                }'>
                     @foreach($category as $c) 
                         <div class="item">
                        <!--Events One Single Start-->
                        <div class="events-one__single">
                            <div class="events-one__img">
                                 @if($c->image)
                                    <img src="/{{$c->image}}" alt="">
                                    @else
                                    <img src="/assets/images/resources/donations-list-img-1.jpg" alt="">
                                @endif
                                <!--<div class="events-one__date">-->
                                <!--    <p>{{$events->created_at}}</p>-->
                                <!--</div>-->
                                <div class="events-one__content">
                                    <h3 class="events-one__title">{{$c->name}}</h3>
                                    <a href="{{$c->pdf}}" class="view" target="_blink">View More</a>
                                </div>
                            </div>
                        </div>
                        <!--Events One Single End-->
                    </div>
                      @endforeach 
                </div>
                <div class="become-volunteer-one__btn-box tt">
                        <a href="/publications" class="thm-btn become-volunteer-one__btn">View all publications</a>
                    </div>
            </div>
        </section>
        <!--Events Page End-->
        
        
       
        
        
        
        
        

        <!--About One Start-->
           <section class="about-one">
            <div class="about-one__shape-box-1">
                <div class="about-one__shape-1"
                    style="background-image: url(assets/images/shapes/about-one-shape-1.png);"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-one__left">
                            <div class="about-one__img-box wow slideInLeft" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <div class="about-one__img">
                                    <img src="images/{{$setting->about_us_image}}" alt="">
                                </div>
                                <div class="about-one__img-border"></div>
                                <div class="about-one__curved-circle-box">
                                    <div class="curved-circle">
                                        <span class="curved-circle--item">
                                            25 YEARS EXPERIENCE COMBODIAN CHEMICAL SOCIETY
                                        </span>
                                    </div><!-- /.curved-circle -->
                                    <div class="about-one__curved-circle-icon">
                                        <img src="assets/images/ccs-small-logo.jpg" alt="">
                                    </div>
                                </div>
                                <div class="about-one__shape-2 zoom-fade">
                                    <img src="assets/images/shapes/about-one-shape-2.png" alt="">
                                </div>
                                <div class="about-one__shape-3 float-bob-y">
                                    <img src="assets/images/shapes/about-one-shape-3.png" alt="">
                                </div>
                                <div class="about-one__shape-4 zoominout">
                                    <img src="assets/images/shapes/about-one-shape-4.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">{{$setting->aboutus_title}}</span>
                                <!--<h2 class="section-title__title">Helping each other can make world better</h2>-->
                            </div>
                            <p class="about-one__text">{{$setting->aboutus_description}} </p>
                        
                            <ul class="list-unstyled about-one__points">
                                <li>
                                    <div class="icon">
                                        <span class="icon-volunteer"></span>
                                    </div>
                                    <div class="text">
                                        <h5><a href="/about-us">{{$setting->our_mission}}</a></h5>
                                        <p>{{Str::of($setting->our_mission_description)->limit(80);}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-solidarity"></span>
                                    </div>
                                    <div class="text">
                                        <h5><a href="/about-us">{{$setting->our_vission}}</a></h5>
                                        <p>{{Str::of($setting->our_vission_description)->limit(80);}}</p>
                                    </div>
                                </li>
                            </ul>
                            <a href="/about-us" class="thm-btn about-one__btn">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About One End-->


        <!--Become Volunteer One Start-->
           <section class="become-volunteer-one">
            <div class="become-volunteer-one__bg-box">
                <div class="become-volunteer-one__bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                    style="background-image: url(images/{{$setting->green_image}});"></div>
            </div>
            <div class="become-volunteer-one__shape-1"
                style="background-image: url(assets/images/shapes/become-volunteer-shape-1.png);"></div>
            <div class="container">
                <div class="become-volunteer-one__inner">
                    <!--<p class="become-volunteer-one__sub-title">"Green Chemistry, Clean World"</p>-->
                    <h3 class="become-volunteer-one__title">{{$setting->green_title}}
                    </h3>
                    <div class="become-volunteer-one__btn-box">
                        <a href="become-volunteer.html" class="thm-btn become-volunteer-one__btn">Discover More</a>
                    </div>
                </div>
            </div>
        </section>
        <!--Become Volunteer One End-->

       

       

       

        <!--Testimonial One Start-->
          <section class="testimonial-one">
            <div class="testimonial-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url(assets/images/bg-sm.jpeg);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="testimonial-one__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Our Testimonials</span>
                                <!--<h2 class="section-title__title">What they are talking about CCS</h2>-->
                            </div>
                            <p class="testimonial-one__text-1">What they are talking about CCS</p>
                            <!--<a href="#" class="thm-btn testimonial-one__btn">all testimonials</a>-->
                        </div>
                    </div>
                    
                    <div class="col-xl-12 col-lg-12">
                        <div class="testimonial-one__right">
                            <div class="testimonial-one__img-1 zoom-fade">
                                <img src="assets/images/testimonial/testimonial-img-1.jpg" alt="">
                            </div>
                            <div class="testimonial-one__img-1 testimonial-one__img-2 zoom-fade">
                                <img src="assets/images/testimonial/testimonial-img-2.jpg" alt="">
                            </div>
                            <div class="testimonial-one__img-1 testimonial-one__img-3 zoom-fade">
                                <img src="assets/images/testimonial/testimonial-img-3.jpg" alt="">
                            </div>
                            <div class="testimonial-one__img-1 testimonial-one__img-4 zoom-fade">
                                <img src="assets/images/testimonial/testimonial-img-4.jpg" alt="">
                            </div>
                            <div class="testimonial-one__carousel owl-carousel owl-theme thm-owl__carousel"
                                data-owl-options='{
                                "loop": true,
                                "autoplay": true,
                                "margin": 50,
                                "nav": true,
                                "dots": false,
                                "smartSpeed": 500,
                                "autoplayTimeout": 10000,
                                "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                                "responsive": {
                                    "0": {
                                        "items": 1
                                    },
                                    "768": {
                                        "items": 1
                                    },
                                    "992": {
                                        "items": 1
                                    },
                                    "1200": {
                                        "items": 1
                                    }
                                }
                            }'>
                                @foreach($testimonial as $testimonials)
                                 <div class="item">
                                    <!--Testimonial One Single Start-->
                                    <div class="testimonial-one__single">
                                        <div class="testimonial-one__shape-1"
                                            style="background-image: url(assets/images/shapes/testimonial-one-shape-1.png);">
                                        </div>
                                        <div class="testimonial-one__client-img">
                                            <img src="/images/{{$testimonials->image}}" alt="">
                                        </div>
                                        <div class="testimonial-one__client-info">
                                            <h3 class="testimonial-one__client-name">{{$testimonials->name}}</h3>
                                            <p class="testimonial-one__client-sub-title">{{$testimonials->designation}}</p>
                                        </div>
                                        <div class="testimonial-one__quote">
                                            <span class="icon-double-quotes"></span>
                                        </div>
                                        <p class="testimonial-one__text-2">{{$testimonials->description}}</p>
                                    </div>
                                    <!--Testimonial One Single End-->
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial One End-->
        
        


        <!--Gallery One Start-->
         <section class="gallery-one">
            <div class="gallery-one__top">
                <h3 class="gallery-one__top-title">Our photo gallery</h3>
            </div>
            <div class="gallery-one__bottom">
                <div class="gallery-one__container">
                    <ul class="list-unstyled gallery-one__list">
                    @foreach($gallery as $gallery )    
                        <li class="gallery-one__single wow fadeInUp" data-wow-delay="100ms">
                            <div class="gallery-one__img">
                                <img src="/images/{{$gallery->image}}" alt="">
                                <a href="/images/{{$gallery->image}}" class="img-popup"></a>
                                
                            </div>
                        </li>
                     @endforeach  
                    </ul>
                </div> 
            </div>
        </section>
       
  


@endsection
