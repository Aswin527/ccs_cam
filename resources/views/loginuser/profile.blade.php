@extends('loginuser.layouts')
@section('meta_title','')
@section('content')

                       

<div class="row">
                            <div class="col-12">
                                <div class="card">
                                     @if ( Session::has('flash_message') )
                                        <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                                            <b>{{ Session::get('flash_message') }}</b>
                                          
                                        </div>
                                    @endif
                                     @if (count($errors) > 0)
                                        <div class = "alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="card-header">
                                        <h4 class="card-title">Update Profile</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/user/update/profile" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Fisrt Name</label>
                                                                    <input type="text" class="form-control" name="fname" id="formrow-email-input" value="{{Auth::user()->firstname}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Last Name</label>
                                                                    <input type="text" class="form-control" name="lname" id="formrow-email-input" value="{{Auth::user()->lastname}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">DOB</label>
                                                                    <input type="date" class="form-control" name="dob" id="formrow-email-input" value="{{Auth::user()->dob}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Gender</label>
                                                                    <select class="form-control" name="gender" id="formrow-email-input">
                                                                         @if(Auth::user() == "Male")
                                                                            <option selected>Male</option>
                                                                            <option>Female</option>
                                                                             <option>Other</option>
                                                                             @elseif(Auth::user() == "Female")
                                                                             <option >Male</option>
                                                                             <option selected>Female</option>
                                                                             <option>Other</option>
                                                                             @else
                                                                             <option>Male</option>
                                                                             <option>Female</option>
                                                                             <option selected>Other</option>
                                                                             @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Country</label>
                                                                    <select class="form-control" name="country" id="country-dropdown">
                                                                          @foreach ($country as $country)
                                                                           
                                                                             <option>Select Option</option>
                                                                               @if($country->country_id == @Auth::user()->country)
                                                                                    <option value="{{$country->country_id}}" selected>{{$country->name}}</option>
                                                                                    @else
                                                                                    <option value="{{$country->country_id}}">{{$country->name}}</option>
                                                                               @endif
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <?php $state = DB::table('states_provinces')->where('state_id',Auth::user()->state)->first(); ?>
                                                                    <label class="form-label" for="formrow-email-input">Select State (@if($state) {{$state->name}} @endif)</label>
                                                                   <select class="form-control" name="state" id="state-dropdown">
                                                                       
                                                                         
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Member ID</label>
                                                                   <input type="text" class="form-control" name="membership_id" id="formrow-password-input" value="{{Auth::user()->membership_id}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Nationality</label>
                                                                    <input type="text" class="form-control" name="nationality" id="formrow-password-input" value="{{Auth::user()->nationality}}">
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Upload Your Photo <img src="/images/{{Auth::user()->photo}}" width="20px"> <a href="/images/{{Auth::user()->photo}}" target="_blink">View</a></label>
                                                                    <input type="file" class="form-control" name="image" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Email ID</label>
                                                                    <input type="text" class="form-control" name="email" id="formrow-email-input" readonly value="{{Auth::user()->email}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Phone Number</label>
                                                                    <input type="text" class="form-control" name="phone_number" id="formrow-email-input" value="{{Auth::user()->mobile}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">National ID Number</label>
                                                                    <input type="text" class="form-control" name="national_id" id="formrow-email-input" value="{{Auth::user()->national_id}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Upload National ID Photo <img src="/images/{{Auth::user()->national_photo}}" width="20px"> <a href="/images/{{Auth::user()->national_photo}}" target="_blink">View</a></label>
                                                                    <input type="file" class="form-control" name="national_photo" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                            <h4>Organization</h4>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Organization</label>
                                                                    <select class="form-control" name="organization" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        @foreach ($organization as $organization)
                                                                           
                                                                             
                                                                               @if($organization->id == @Auth::user()->organization)
                                                                                    <option value="{{$organization->id}}" selected>{{$organization->organization_name}}</option>
                                                                                    @else
                                                                                    <option value="{{$organization->id}}">{{$organization->organization_name}}</option>
                                                                               @endif
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">organization Position</label>
                                                                    <select class="form-control" name="porganization" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        @foreach ($category as $category)
                                                                           
                                                                             
                                                                               @if($category->id == @Auth::user()->porganization)
                                                                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                                                                    @else
                                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                               @endif
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input"> Position in CCS</label>
                                                                    <select class="form-control" name="norganization" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        @foreach ($position as $position)
                                                                           
                                                                             
                                                                               @if($position->id == @Auth::user()->norganization)
                                                                                    <option value="{{$position->id}}" selected>{{$position->name}}</option>
                                                                                    @else
                                                                                    <option value="{{$position->id}}">{{$position->name}}</option>
                                                                               @endif
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">  
                                                                 
                                                                    <label class="form-label" for="formrow-email-input">Qualification</label>
                                                                      <select class="form-control" name="qualification" id="formrow-email-input">
                                                                    @foreach ($education as $education)
                                                                           @if($education->id == @Auth::user()->qualification)
                                                                                    <option value="{{$education->id}}" selected>{{$education->education}}</option>
                                                                                    @else
                                                                                    <option value="{{$education->id}}">{{$education->education}}</option>
                                                                               @endif
                                                                            @endforeach
                                                                  </select>            
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                         <h4 class="organization">Bank Detail</h4>
                                                          <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Bank Name</label>
                                                                    <input type="text" class="form-control" name="bank_name" id="formrow-password-input" value="{{Auth::user()->bank_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Bank Holder Name</label>
                                                                    <input type="text" class="form-control" name="bank_holder_name" id="formrow-password-input" value="{{Auth::user()->bank_holder_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Account Number</label>
                                                                    <input type="text" class="form-control" name="account_number" id="formrow-password-input" value="{{Auth::user()->account_number}}">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">IFSC Code</label>
                                                                    <input type="text" class="form-control" name="ifsc_code" id="formrow-password-input" value="{{Auth::user()->ifsc_code}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Swift Code</label>
                                                                    <input type="text" class="form-control" name="swift_code" id="formrow-password-input" value="{{Auth::user()->swift_code}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">IBAN Number</label>
                                                                    <input type="text" class="form-control" name="ban_number" id="formrow-password-input" value="{{Auth::user()->ban_number}}">
                                                                </div>
                                                            </div>
                                                          </div>
                                                        
            
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-primary w-md">Update Profile</button>
                                                        </div>
                                                    </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
<script>
     $(document).ready(function () {
  
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
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
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dropdown').on('change', function () {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
  
        });
</script>
@endsection

