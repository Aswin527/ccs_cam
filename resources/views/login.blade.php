@extends('layouts.app')
@section('meta_title','Login')
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
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Cambodian Chemical Society</a></li>
                        <li><span>></span></li>
                        <li class="active">Login</li>
                    </ul>
                    <h2>Login</h2>
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
                    
                    <form action="/user/login" method="POST" 
                        >
                        @csrf
                        
                       
                       <div class="row" >
                           
                             <div class="col-xl-12">
                                <div class="contact-form__input-box">
                                    <input type="email" placeholder="Email" name="email">
                                </div>
                            </div>
                             <div class="col-xl-12">
                                <div class="contact-form__input-box">
                                    <input type="password" placeholder="Password" name="password">
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