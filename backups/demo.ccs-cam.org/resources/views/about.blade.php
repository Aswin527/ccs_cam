@extends('layouts.app')
@section('meta_title','')


@section('content')
<?php $setting = DB::table('settings')->where('id',1)->first();?>
<section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/bg_about-us.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Pages</li>
                    </ul>
                    <h2>About us</h2>
                </div>
            </div>
</section>
<section class="owner">
    <div class="container">
        <div class="row">
            <div class="col-xl-8">
                <div class="owner-text">
                   <h4>{{$setting->president_name}}</h4>
                   <h6>Cambodian Chemical Society</h6>
                   <p>{{Str::of($setting->president_description)->limit(180);}}</p>
                   <a href="/know-more-message-from-president">Know More Message From President </a>
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



@endsection