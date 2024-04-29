@extends('layouts.admin')
@section('title','Partner | Home')
@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                    
                                    <div class="card-header">
                                        <h4 class="card-title">Edit member</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/add/member/update" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Fisrt Name</label>
                                                                    <input type="text" class="form-control" name="fname" id="formrow-email-input" value="{{$data->firstname}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Last Name</label>
                                                                    <input type="text" class="form-control" name="lname" id="formrow-email-input" value="{{$data->lastname}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">DOB</label>
                                                                    <input type="date" class="form-control" name="dob" id="formrow-email-input" value="{{$data->dob}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Gender</label>
                                                                    <select class="form-control" name="gender" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                          @if($data->gender == "Male")
                                                                            <option selected>Male</option>
                                                                            <option>Female</option>
                                                                             <option>Other</option>
                                                                             @elseif($data->gender == "Female")
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
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Member Category</label>
                                                                    <select class="form-control" name="member_category" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        @if($data->member_category == "New Member")
                                                                          <option selected>New Member</option>
                                                                          <option>Become Member</option>
                                                                        @else
                                                                        <option>New Member</option>
                                                                          <option selected>Become Member</option>
                                                                        @endif
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Member ID</label>
                                                                   <input type="text" class="form-control" name="membership_id" id="formrow-password-input" value="{{$data->membership_id}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Upload Your Photo</label>
                                                                    <input type="file" class="form-control" name="image" id="formrow-password-input" value="{{$data->photo}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Email ID</label>
                                                                    <input type="text" class="form-control" name="email" id="formrow-email-input" value="{{$data->email}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Phone Number</label>
                                                                    <input type="text" class="form-control" name="phone_number" id="formrow-email-input" value="{{$data->mobile}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">National ID Number</label>
                                                                    <input type="text" class="form-control" name="national_id" id="formrow-email-input" value="{{$data->national_id}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Upload National ID Photo</label>
                                                                    <input type="file" class="form-control" name="national_photo" id="formrow-password-input" value="{{$data->national_photo}}">
                                                                </div>
                                                            </div>
                                                             
                                                           
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Select Country</label>
                                                                    <select class="form-control" name="country" id="country-dropdown">
                                                                        
                                                                       <option>Select Option</option>
                                                                          @foreach ($country as $country)
                                                                           
                                                                           
                                                                               @if($country->country_id == $data->country)
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
                                                                   
                                                                     <?php $state = DB::table('states_provinces')->where('state_id',$data->state)->first(); ?>
                                                                    <label class="form-label" for="formrow-email-input">Select Province (@if($state) {{$state->name}} @endif)</label>
                                                                   <select class="form-control" name="state" id="state-dropdown">
                                                                       
                                                                         
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Nationality</label>
                                                                    <input type="text" class="form-control" name="nationality" id="formrow-password-input" value="{{$data->nationality}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h4 class="organization">Organization Information</h4>
                                                        <div class="row">
                                                             <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Organization</label>
                                                                    
                                                                    <select class="form-control" name="organization" id="formrow-email-input">
                                                                        <option>Select Organization</option>
                                                                         @foreach($organization as $organization)
                                                                           @if( $organization->id == $data->organization)
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
                                                                    <label class="form-label" for="formrow-email-input">Orgaization Position</label>
                                                                    <select class="form-control" name="porganization" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                        @foreach($category as $cat)
                                                                         @if( $cat->id == $data->porganization)
                                                                           <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                                                         @else
                                                                         <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                                         @endif
                                                                        @endforeach  
                                                                    </select>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Position In CCS</label>
                                                                    <select class="form-control" name="norganization" id="formrow-email-input">
                                                                        <option>Select Option</option>
                                                                         @foreach($position as $partner)
                                                                           @if($partner->id == $data->norganization)
                                                                              <option value="{{$partner->id}}" selected>{{$partner->name}}</option>
                                                                            @else
                                                                            <option value="{{$partner->id}}">{{$partner->name}}</option>
                                                                            @endif
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
                                                                         @if($education->id == $data->qualification)
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
                                                                    <input type="text" class="form-control" name="bank_name" id="formrow-password-input" value="{{$data->bank_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Bank Holder Name</label>
                                                                    <input type="text" class="form-control" name="bank_holder_name" id="formrow-password-input" value="{{$data->bank_holder_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Account Number</label>
                                                                    <input type="text" class="form-control" name="account_number" id="formrow-password-input" value="{{$data->account_number}}">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">IFSC Code</label>
                                                                    <input type="text" class="form-control" name="ifsc_code" id="formrow-password-input" value="{{$data->ifsc_code}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Swift Code</label>
                                                                    <input type="text" class="form-control" name="swift_code" id="formrow-password-input" value="{{$data->swift_code}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">IBAN Number</label>
                                                                    <input type="text" class="form-control" name="ban_number" id="formrow-password-input" value="{{$data->ban_number}}">
                                                                </div>
                                                            </div>
                                                          </div>
                                                        <input type="hidden" class="form-control" name="id" id="formrow-password-input" value="{{$data->id}}">
            
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                        </div>
                                                    </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>



@endsection