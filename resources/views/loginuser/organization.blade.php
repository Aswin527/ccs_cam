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
                                        <h4 class="card-title">Update Organization</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/user/organization/update" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Organizaton Name</label>
                                                                    <input type="text" class="form-control" name="organization_name" id="formrow-email-input" value="{{@$organization->organization_name}}">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Organizaton Registartion Number</label>
                                                                    <input type="text" class="form-control" name="organization_regidtartioin_number" id="formrow-email-input" value="{{@$organization->organization_regidtartioin_number}}">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Organizaton Registartion Certificate <img src="/images/{{@$organization->organization_registration_certificate}}" width="20px"> <a href="/images/{{@$organization->organization_registration_certificate}}" target="_blink">View</a></label>
                                                                    <input type="file" class="form-control" name="organization_registration_certificate" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Orgaization Category</label>
                                                                    <select class="form-control" name="organizaion_category" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                         @foreach($category as $cat)
                                                                          @if(@$organization->organizaion_category == $cat->name)
                                                                            <option selected>{{$cat->name}}</option>
                                                                            @else
                                                                            <option>{{$cat->name}}</option>
                                                                            @endif
                                                                         @endforeach  
                                                                    </select>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Country</label>
                                                                    <select class="form-control" name="country" id="country-dropdown">
                                                                        <option>Select Option</option>
                                                                       
                                                                           @foreach ($country as $country)
                                                                           
                                                                             
                                                                               @if($country->country_id == @$organization->country)
                                                                                    <option value="{{$country->country_id}}" selected>{{$country->name}}</option>
                                                                                    @else
                                                                                    <option value="{{$country->country_id}}">{{$country->name}}</option>
                                                                               @endif
                                                                            @endforeach
                                                                         
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Province</label>
                                                                    <select class="form-control" name="state" id="state-dropdown">
                                                                       
                                                                         
                                                                    </select>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Organization Email ID</label>
                                                                    <input type="text" class="form-control" name="organization_email" id="formrow-email-input" value="{{@$organization->organization_email}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Organization Phone Number</label>
                                                                    <input type="text" class="form-control" name="organizaton_phone" id="formrow-email-input" value="{{@$organization->organizaton_phone}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Website</label>
                                                                    <input type="text" class="form-control" name="website" id="formrow-email-input" value="{{@$organization->website}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Authorized Person Name</label>
                                                                    <input type="text" class="form-control" name="authorize_person" id="formrow-email-input" value="{{@$organization->authorize_person}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Authorized Person Phone Number</label>
                                                                    <input type="text" class="form-control" name="authorize_phone" id="formrow-email-input" value="{{@$organization->authorize_phone}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
            
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-primary w-md">Update Organization</button>
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
