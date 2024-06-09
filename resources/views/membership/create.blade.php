@extends('layouts.app')
@section('meta_title','Membership')
@section('meta_keywords','Membership')
@section('meta_description','Membership')
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
                        <li class="active">Membership</li>
                    </ul>
                    <h2>Membership</h2>
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
                   
                   
                   
                    <span class="section-title__tagline">Contact with us</span>
                    <h2 class="section-title__title">Be a Member of the CCS ! </h2>
                </div>
                
                <div class="contact-page__form-box">
                    
                    <form action="/membership/user/store" method="POST" 
                        >
                        @csrf
                        <h4>Personal Information</h4>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <select name="member_status" onchange="showDiv(this)">
                                        <option>
                                            Select Member Status
                                        </option>
                                        <option value="0">
                                           New Member
                                        </option>
                                        <option value="1">
                                            Become Member
                                        </option>
                                          
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <select name="gender">
                                        <option>
                                            Select Gender
                                        </option>
                                        <option>
                                            Male
                                        </option>
                                        <option>
                                            Female
                                        </option>
                                          <option>
                                            Other
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="First Name" name="fname">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Last Name" name="lname">
                                </div>
                            </div>

                            

                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="date" placeholder="Date of birth" name="dob">
                                </div>
                            </div>
                             
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Qualification" name="qualification">
                                </div>
                            </div>
                            <div class="col-xl-6" id="organization_div">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Organization" name="organization">
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Department" name="department">
                                </div>
                            </div>
                             
                            <div class="col-xl-6" id="country_div">
                                <div class="contact-form__input-box">
                                   <div class="contact-form__input-box">
                                    <select name="country" id="country-dropdown">
                                        <option>
                                            Select Country
                                        </option>
                                        @foreach($country as $country )
                                        <option value="{{$country->country_id}}">{{$country->name}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
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
                                    <input type="text" placeholder="Address" name="address">
                                </div>
                            </div>
                            
                        </div>
                        <div id="hidden_div">
                            <h4>Organization Information</h4>
                            <div class="row" >
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Working Organization Name" name="working_organization_name">
                                </div>
                            </div>
                             <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                   <div class="contact-form__input-box">
                                    <select name="postion">
                                        <option>
                                            Select Position
                                        </option>
                                        @foreach($position as $position )
                                          <option> {{$position->name}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-form__input-box">
                                    <input type="text" placeholder="Membership Number" name="membership_number">
                                </div>
                            </div>
                             <div class="col-xl-6">
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
                        </div>
                        
                        
                       
                        <div class="row">
                            <div class="col-xl-12">
                                
                                <div class="contact-form__btn-box">
                                    <button type="submit" name="submit"class="thm-btn contact-form__btn">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        
@endsection
@section('js')
  <script>

document.getElementById('country_div').style.display = "none";
document.getElementById('state_div').style.display = "none";
document.getElementById('organization_div').style.display = "none";

$('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "get",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        
                        $('#state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .state_id + '">' + value.name + '</option>');
                        });
                       
                    }
                });
            });

 function showDiv(select){
   
   if(select.value != 0){
    document.getElementById('hidden_div').style.display = "block";
    document.getElementById('country_div').style.display = "none";
    document.getElementById('state_div').style.display = "none";
    document.getElementById('organization_div').style.display = "none";
   } else{
    document.getElementById('hidden_div').style.display = "none";
    document.getElementById('country_div').style.display = "block";
    document.getElementById('state_div').style.display = "block";
    document.getElementById('organization_div').style.display = "block";
   }
} 
</script>
@endsection