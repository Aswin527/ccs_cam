@extends('layouts.app')
@section('meta_title','Events')
@section('content')
<section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/bg_about-us.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">All Events</li>
                    </ul>
                    <h2>All Events</h2>
                </div>
            </div>
</section>

<section class="donations-list">
            <div class="container">
                <div class="donations-list__inner">
                    @foreach($data as $data)
                            <!--Donations List Single Start-->
                            <div class="donations-list__single">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="donations-list__img">
                                            @if($data->image_event)
                                            <img src="/images/{{$data->image_event}}" alt="">
                                            @else
                                            <img src="assets/images/resources/donations-list-img-1.jpg" alt="">
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="donations-list__right">
                                            <div class="donations-list__content">
                                                <div class="donations-list__category">
                                                    <p>{{$data->location_event}}</p>
                                                </div>
                                                <h3 class="donations-list__title"><a href="#">{{$data->event_name}}</a></h3>
                                                <p class="donations-list__text m-b-10">{{$data->about_event}}</p>
                                               <a href="/qrcode/{{$data->id}}" class="thm-btn about-one__btn">View Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Donations List Single End-->
                            
                   @endforeach            
                   
                </div>
            </div>
        </section>




@endsection