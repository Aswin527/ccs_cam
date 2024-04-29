@extends('layouts.app')
@section('meta_title','Events')

@section('content')

<section class="page-header">
            <div class="page-header-bg" style="background-image: url(/assets/images/Angkor-Wat-temple-complex-Camb.webp)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.html">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Event details</li>
                    </ul>
                    <h2>Event details</h2>
                </div>
            </div>
        </section>
        
        
        
<section class="event-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="event-details__left">
                            <div class="event-details__top">
                                <div class="event-details__date">
                                    <p>{{$data->date}}</p>
                                </div>
                                <h3 class="event-details__title">{{$data->event_name}}</h3>
                                <p class="event-details__text-1">{{$data->about_event}}</p>
                               
                            </div>
                            <div class="event-details__img-box">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="event-details__img-single">
                                            @if($data->image_event)
                                              <img src="/images/{{$data->image_event}}" alt="">
                                             @else
                                             <img src="/assets/images/Angkor-Wat-temple-complex-Camb.webp" alt="">
                                             @endif
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="event-details__right">
                            <div class="event-details__info">
                                <ul class="list-unstyled event-details__info-list">
                                    <li>
                                        <span>Darte:</span>
                                        <p>{{$data->date}}</p>
                                    </li>
                                    
                                    <li>
                                        <span>Location:</span>
                                        <p>{{$data->location_event}}</p>
                                    </li>
                                </ul>
                               
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>        



 

        
    




@endsection