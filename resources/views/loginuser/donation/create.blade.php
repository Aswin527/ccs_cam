@extends('layouts.app')
@section('meta_title','DonateNow')
@section('meta_keywords','DonateNow')
@section('meta_description','DonateNow')
@section('content') 
<style>
    .container-aboutus {
    height:200px;
}
.contact-three .container {
    max-width:1200px;
}
</style>
<section class="">
            
            <div class="container-aboutus">
            <div class="overlay"></div>
                <div class="page-header__inner" >
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Cambodian Chemical Society</a></li>
                        <li><span>></span></li>
                        <li class="active">Donate Now</li>
                    </ul>
                    <h2>Donate Now</h2>
                </div>
            </div>
        </section>

        <section class="contact-three" style="margin-top:0px;">
            <div class="contact-three-shape"
                style="background-image: url(assets/images/shapes/contact-three-shape.png);"></div>
            <div class="container">
                <div class="section-title text-center">
                      
                    @if ( Session::has('flash_message') )
                        <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                            <b>{{ Session::get('flash_message') }}</b>
                            
                        </div>
                    @endif
                   
                   
                   
                    <span class="section-title__tagline">Donate Now</span>
                </div>
                
                <div class="contact-page__form-box">
                    
                    <form action="/donation_request/store" method="POST" 
                        >
                        @csrf
                        <div class="row">
                        <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                <select name="gender" id="">
                                        <option value="">
                                            Select Gender
                                        </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                       
                                    </select>
                                </div>
                            </div>
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
                                    <input type="text" placeholder="Name of Organization" name="organization">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                <select name="country" id="country-dropdown">
                                        <option value="">
                                            Select Country
                                        </option>
                                        @foreach($country as $country )
                                        <option value="{{$country->name}}" country_id="{{$country->country_id}}">{{$country->name}}</option>
                                        @endforeach 
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6" id="state_div">
                                <div class="contact-form__input-box">
                                   <div class="contact-form__input-box">
                                    <select name="state" id="state-dropdown">
                                        <option>
                                            Select Province 
                                        </option>
                                       
                                       
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Designation" name="designation">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-form__input-box text-message-box">
                                    <textarea name="comments" placeholder="Your Comments"></textarea>
                                </div>
                                <div class="contact-form__btn-box">
                                    <button type="submit" class="thm-btn contact-form__btn">Submit</button>
                                </div>
                            </div>
                        </div>
                                          
                           
                    </form>
                </div>
            </div>
        </section>
        
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    
// document.getElementById('state_div').style.display = "none";

$('#country-dropdown').on('change', function () {
                // var idCountry = this.value;
                var element = $(this).find('option:selected'); 
        var idCountry = element.attr("country_id"); 
                console.log(idCountry);
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('api/get-states')}}",
                    type: "get",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        $('#state-dropdown').html('<option value="">-- Select Province --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .name + '">' + value.name + '</option>');
                        });
                       
                    }
                });
            });
</script>
@endsection