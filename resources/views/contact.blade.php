@extends('layouts.app')
@section('meta_title','contactus')
@section('meta_keywords','contactus')
@section('meta_description','contactus')
@section('content') 
<section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/bg_about-us.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Contact</li>
                    </ul>
                    <h2>Contact us</h2>
                </div>
            </div>
        </section>

        <section class="contact-three">
            <div class="contact-three-shape"
                style="background-image: url(assets/images/shapes/contact-three-shape.png);"></div>
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Contact with us</span>
                    <h2 class="section-title__title">Feel free to write us <br> anytime</h2>
                </div>
                <div class="contact-page__form-box">
                    <form action="https://layerdrops.com/oxpinshtml/main-html/assets/inc/sendemail.php" class="contact-page__form contact-form-validated"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Your name" name="name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="email" placeholder="Email address" name="email">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Phone" name="phone">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Subject" name="subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-form__input-box text-message-box">
                                    <textarea name="message" placeholder="Write a message"></textarea>
                                </div>
                                <div class="contact-form__btn-box">
                                    <button type="submit" class="thm-btn contact-form__btn">Send a message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="contact-one">
            <div class="container">
                <div class="contact-one__inne">
                    <ul class="list-unstyled contact-one__list">
                        <li class="contact-one__single">
                            <div class="contact-one__icon">
                                <span class="icon-phone-call"></span>
                            </div>
                            <div class="contact-one__content">
                                <p class="contact-one__sub-title">Helpline</p>
                                <h3 class="contact-one__number"><a href="tel:(855)16 839 279">(855)16 839 279</a> , 
                                <a href="tel:(855)69 995 886">(855)69 995 886</a></h3>
                            </div>
                        </li>
                        <li class="contact-one__single">
                            <div class="contact-one__icon">
                                <span class="icon-message"></span>
                            </div>
                            <div class="contact-one__content">
                                <p class="contact-one__sub-title">Send email</p>
                                <h3 class="contact-one__number"><a
                                        href="mailto:info@ccs-cam.org">info@ccs-cam.org</a></h3>
                            </div>
                        </li>
                        <li class="contact-one__single">
                            <div class="contact-one__icon">
                                <span class="icon-location"></span>
                            </div>
                            <div class="contact-one__content">
                                <p class="contact-one__sub-title">No 72, Street 598, Boeung Kak II, </p>
                                <h3 class="contact-one__number"> Toul Kork, Phnom Penh, Cambodia</h3>
                                 
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="google-map google-map-two">
            
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.554722732883!2d104.88513777409862!3d11.583745143786023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951815ffe1b8d%3A0x3eb94c865c6a2ea3!2s72%20Street%20598%2C%20Phnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2sin!4v1710304897663!5m2!1sen!2sin" width="600" height="450" style="border:0;" class="google-map__one" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </section>
@endsection