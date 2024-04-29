@extends('layouts.app')
@section('meta_title','Contact Us')
@section('meta_keywords','Contact Us')
@section('meta_description','Contact Us')
@section('meta_image')
content="{{ Request::root() }}/images/logo-2.png"
@endsection
@section('content')
<div class="page-title-area bg-26">
            <div class="container">
                <div class="page-title-content">
                    <h2>Contact</h2>

                    <ul>
                        <li>
                            <a href="index.html">
                                Home 
                            </a>
                        </li>

                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>

<!-- Start Contact Info Area -->
        <section class="contact-info-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="map-area">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13685.236336356178!2d76.519356!3d30.9618557!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x648948e234a1e851!2sVersatile%20Institute%20-%20Spoken%20English%20Centre%20%2F%20Best%20Computer%20Centre%20%2F%20Ielts%20Centre%20in%20Ropar!5e0!3m2!1sen!2sin!4v1656147458204!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="contact-info">
                            <h2>Get in touch</h2>

                            <ul class="address">
                                <li class="location">
                                    <i class="ri-map-pin-2-fill"></i>
                                    <span>Address</span>
                                    SCO 25, Beant Singh, Bela Rd, part -2, Aman Nagar, Rupnagar, Punjab 140001
                                </li>
                                <li>
                                    <i class="ri-mail-line"></i>
                                    <span>Email</span>
                                    <a href="mailto:lpudistancelearning@gmail.com"><span class="__cf_email__" >lpudistancelearning@gmail.com</span></a>
                                </li>
                                <li>
                                    <i class="ri-phone-fill"></i>
                                    <span>Phone</span>
                                    <a href="tel:62844 55865">62844 55865</a>
                                </li>
                            </ul>

                            <h3>Follow Us</h3>

                            <ul class="social-link">
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="ri-instagram-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="ri-linkedin-box-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Info Area -->

        <!-- Start Contact Area -->
        <section class="contact-area pb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Send us a quick message</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis ut nostrum, quibusdam, voluptatum eaque illo cum, aperiam accusantium reprehenderit</p>
                </div>
                
                <form id="contactForm">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group checkboxs">
                                <input type="checkbox" id="chb2">
                                <p>
                                    Accept <a href="terms-conditions.html">Terms &amp; Conditions</a> And <a href="privacy-policy.html">Privacy Policy.</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="default-btn">
                                <span>Send message</span>
                            </button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Contact Area -->
@endsection