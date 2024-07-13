@extends('layouts.app')
@section('meta_title','Admin Login')
@section('content')
<style>
    .container-aboutus {
            height:200px;
        } 
</style>
<section class="">
            <!-- <div class="page-header-bg" style="background-image: url(assets/images/bg_about-us.jpg)">
            </div> -->
            <div class="container-aboutus">
            <div class="overlay"></div>
                <div class="page-header__inner">
                    
                    <h2>Admin Login</h2>
                </div>
            </div>
        </section>
        <section class="contact-three">
            <div class="contact-three-shape"
                style="background-image: url(assets/images/shapes/contact-three-shape.png);"></div>
            <div class="container">
                <div class="section-title text-center">
                      
                    @if ( Session::has('flash_message') )
                        <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                            <b>{{ Session::get('flash_message') }}</b>
                            
                        </div>
                    @endif
                   
                   
                   
                    <span class="section-title__tagline">Login Here</span>
                
                </div>
                
                <div class="contact-page__form-box">
                    
                    <form action="{{ url('/lms/login') }}" method="POST" >
                        @csrf
                        
                       
                       <div class="row" >
                           
                             <div class="col-xl-12">
                                <div class="contact-form__input-box">
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" name="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="col-xl-12">
                                <div class="contact-form__input-box">
                                    <input id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        
                        
                       
                        <div class="row">
                            <div class="col-xl-12">
                                
                                <div class="contact-form__btn-box">
                                    <button type="submit" name="submit"class="thm-btn contact-form__btn">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
@endsection