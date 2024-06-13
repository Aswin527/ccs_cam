@extends('layouts.app')
@section('meta_title', 'Contact Us - Cambodian Chemical Society')
@section('meta_keywords', 'Contact, Cambodian Chemical Society, Support')
@section('meta_description', 'Get in touch with the Cambodian Chemical Society. We are here to assist you with any inquiries you may have.')
@section('content')
<style>
    .container-aboutus {
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f5f5f5;
        margin-bottom: 20px;
    }
    .page-header__inner {
        text-align: center;
    }
    .thm-breadcrumb {
        margin-bottom: 10px;
    }
    .thm-breadcrumb li {
        display: inline;
        margin-right: 5px;
    }
    .thm-breadcrumb li a {
        color: #007bff;
    }
    .contact-page__form-box {
        margin-top: 20px;
    }
    .contact-form__input-box {
        margin-bottom: 15px;
    }
    .contact-one__inne {
        margin-top: 30px;
    }
</style>

<section class="container-aboutus">
    <div class="page-header__inner">
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="/">Cambodian Chemical Society</a></li>
            <li><span>></span></li>
            <li class="active">Contact</li>
        </ul>
        <h2>Contact Us</h2>
    </div>
</section>

<section class="contact-three">
    <div class="contact-three-shape" style="background-image: url(assets/images/shapes/contact-three-shape.png);"></div>
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Get in Touch</span>
            <h2 class="section-title__title">Feel free to write us <br> anytime</h2>
        </div>
        <div class="contact-page__form-box">
            <form action="/sendemail.php" class="contact-page__form contact-form-validated" method="POST" novalidate="novalidate">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Your Name" name="name" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="email" placeholder="Email Address" name="email" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Phone" name="phone" required>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Subject" name="subject" required>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact-form__input-box text-message-box">
                            <textarea name="message" placeholder="Write a message" required></textarea>
                        </div>
                        <div class="contact-form__btn-box">
                            <button type="submit" class="thm-btn contact-form__btn">Send a Message</button>
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
                        <h3 class="contact-one__number"><a href="tel:(855)16 839 279">(855) 16 839 279</a>, <a href="tel:(855)69 995 886">(855) 69 995 886</a></h3>
                    </div>
                </li>
                <li class="contact-one__single">
                    <div class="contact-one__icon">
                        <span class="icon-message"></span>
                    </div>
                    <div class="contact-one__content">
                        <p class="contact-one__sub-title">Send Email</p>
                        <h3 class="contact-one__number"><a href="mailto:info@ccs-cam.org">info@ccs-cam.org</a></h3>
                    </div>
                </li>
                <li class="contact-one__single">
                    <div class="contact-one__icon">
                        <span class="icon-location"></span>
                    </div>
                    <div class="contact-one__content">
                        <p class="contact-one__sub-title">Office Address</p>
                        <h3 class="contact-one__number">No 72, Street 598, Boeung Kak II, Toul Kork, Phnom Penh, Cambodia</h3>
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
