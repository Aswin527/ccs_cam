@extends('layouts.app')
@section('meta_title','Events')
@section('content')




 <section class="donation-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                         <div class="comment-form">
                                <h3 class="comment-form__title">Join The Events</h3>
                                <form action="/events/store/memerid" class="comment-one__form contact-form-validated">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="comment-form__input-box">
                                                <input type="text" placeholder="Your Member ID" name="member_id">
                                                     <input type="hidden" id="event" name="event_id">
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                           
                                            <div class="comment-form__btn-box">
                                                <button type="submit" class="thm-btn comment-form__btn">Join</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <div class="donation-details__left">
                            <div class="donation-details__top">
                            
                                <div class="donation-details__content">
                                    <h3 class="donation-details__title">{{$data->event_name}}</h3>
                                    <p class="donation-details__text">{{$data->about_event}} </p>
                                </div>
                            </div>
                            
                            
                           
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>




@endsection