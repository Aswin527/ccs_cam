@extends('layouts.app')
@section('meta_title','')


@section('content')
<style>
    .contact-three .container {
  max-width:1200px;
}
</style>
<?php $setting = DB::table('settings')->where('id',1)->first();?>
<div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

<section class="">
            
            <div class="container-aboutus">
                <div class="overlay"></div>
                <div class="page-header__inner">
                    <!-- <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Pages</li>
                    </ul> -->
                    <h2>About CCS</h2>
                    <p>As a non-profit scientific organization</br> with more than 140 years’ experience, we are a champion for chemistry, </br>its practitioners and our global community of members.</p>
                </div>
            </div>
</section>
        <section class="contact-three">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="owner-text">
                            <h3>Message from President</h3>
                            <h4>{{$setting->president_name}}</h4>
                            <h6>Cambodian Chemical Society</h6>
                            <p>
            {{ Str::limit($setting->president_description, 150) }}
            <span class="dots">...</span>
            <span class="more-content">{{ Str::substr($setting->president_description, 150) }}</span>
        </p>
        <span class="read-more-btn">Read More</span>
        <span class="read-less-btn" style="display: none;">Read Less</span>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const readMoreBtn = document.querySelector('.read-more-btn');
                const readLessBtn = document.querySelector('.read-less-btn');
                const dots = document.querySelector('.dots');
                const moreContent = document.querySelector('.more-content');

                readMoreBtn.addEventListener('click', () => {
                    dots.style.display = 'none';
                    moreContent.style.display = 'inline';
                    readMoreBtn.style.display = 'none';
                    readLessBtn.style.display = 'inline';
                });

                readLessBtn.addEventListener('click', () => {
                    dots.style.display = 'inline';
                    moreContent.style.display = 'none';
                    readMoreBtn.style.display = 'inline';
                    readLessBtn.style.display = 'none';
                });
            });
        </script>
                    <!-- <a href="/know-more-message-from-president">Know More Message From President </a> -->
                </div>
            </div>
            <div class="col-xl-4">
                <div class="owner-image">
                    <img src="/images/{{$setting->president_image}}" width="200px"> 
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mission">
   <div class="container">
      <div class="row">
          <div class="col-xl-12">
              <div class="mission-title">
                  <h4>{{$setting->our_vission}}</h4>
                  <p>{{$setting->our_vission_description}}</p>
              </div>
              <div class="mission-title">
                  <h4>{{$setting->our_mission}}</h4>
                  <p>{{$setting->our_mission_description}}</p>
              </div>
              <div class="mission-title">
                  <h4>{{$setting->objective_title}}</h4>
                  <p>{{$setting->objective_description}}</p>
                  
                    </div>
          </div>
      </div>  
   </div> 
</section>

<script src="/assets/js/oxpins.js"></script>
    @yield('js')

@endsection