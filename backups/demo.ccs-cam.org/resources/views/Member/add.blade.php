@extends('layouts.admin')
@section('title','Partner | Home')
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
                                        <h4 class="card-title">Add member</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/add/member/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Fisrt Name</label>
                                                                    <input type="text" class="form-control" name="fname" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Last Name</label>
                                                                    <input type="text" class="form-control" name="lname" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">DOB</label>
                                                                    <input type="date" class="form-control" name="dob" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Gender</label>
                                                                    <select class="form-control" name="gender" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        <option>Male</option>
                                                                        <option>Female</option>
                                                                        <option>Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Member Category</label>
                                                                    <select class="form-control" name="member_category" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        <option>New Member</option>
                                                                        <option>Become Member</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Member ID</label>
                                                                   <input type="text" class="form-control" name="membership_id" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Upload Your Photo</label>
                                                                    <input type="file" class="form-control" name="image" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Email ID</label>
                                                                    <input type="text" class="form-control" name="email" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Phone Number</label>
                                                                    <input type="text" class="form-control" name="phone_number" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">National ID Number</label>
                                                                    <input type="text" class="form-control" name="national_id" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Upload National ID Photo</label>
                                                                    <input type="file" class="form-control" name="national_photo" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Password</label>
                                                                    <input type="text" class="form-control" name="password" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Country</label>
                                                                    <select class="form-control" name="country" id="country-dropdown">
                                                                        
                                                                        <option>Select Option</option>
                                                                          @foreach ($country as $country)
                                                                           
                                                                             
                                                                              <option value="{{$country->country_id}}">{{$country->name}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                   
                                                                    <label class="form-label" for="formrow-email-input">Select Province</label>
                                                                   <select class="form-control" name="state" id="state-dropdown">
                                                                       
                                                                         
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Nationality</label>
                                                                    <input type="text" class="form-control" name="nationality" id="formrow-password-input" value="{{Auth::user()->nationality}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="organization">Organization Information</h4>
                                                        <div class="row">
                                                             <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Name in Organization</label>
                                                                    <!--<input type="text" class="form-control" name="organization" id="formrow-email-input">-->
                                                                    <select class="form-control" name="organization" id="formrow-email-input">
                                                                        <option>Select Organization</option>
                                                                        @foreach($organization as $organization)
                                                                          <option value="{{$organization->id}}">{{$organization->organization_name}}</option>
                                                                        @endforeach  
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Orgaization Position</label>
                                                                    <select class="form-control" name="porganization" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        @foreach($category as $cat)
                                                                          <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                                        @endforeach  
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Position In CCS</label>
                                                                    <select class="form-control" name="norganization" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        @foreach($position as $position)
                                                                         <option value="{{$position->id}}">{{$position->name}}</option>
                                                                       @endforeach     
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Qualification</label> 
                                                                   
                                                                    <select class="form-control" name="qualification" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        @foreach($education as $education)
                                                                         <option value="{{$education->id}}">{{$education->education}}</option>
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
                                                                    <input type="text" class="form-control" name="bank_name" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Bank Holder Name</label>
                                                                    <input type="text" class="form-control" name="bank_holder_name" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Account Number</label>
                                                                    <input type="text" class="form-control" name="account_number" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">IFSC Code</label>
                                                                    <input type="text" class="form-control" name="ifsc_code" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Swift Code</label>
                                                                    <input type="text" class="form-control" name="swift_code" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">IBAN Number</label>
                                                                    <input type="text" class="form-control" name="ban_number" id="formrow-password-input">
                                                                </div>
                                                            </div>
                                                          </div>
            
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
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