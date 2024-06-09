@extends('loginuser.layouts')
@section('meta_title','')
@section('content')

<style>
    .profile-image {
	border-radius: 8%;
	overflow: hidden;
	width: 150px;
	height: 200px;
	position: relative;
	img {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 100%;
	}
}


.center {
    text-align:center;
}


</style>                       

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title" style="font-size:30px;">Profile 
                        <a href="/user/edit_profile" class=""><button  style="float:right;" class="btn btn-primary w-md">Edit Profile</button></a>
                    </h1>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    
                    <div class="card col-md-5">
                        <div class="profile-image mt-3 mb-5" style="margin-left:150px;">
                            <img class=""   src="/images/{{Auth::user()->photo}}" >
                        </div>
                        
                        <h1 class="center" style="color:#5156be;">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h1>
                        
                        <h5 class="center" style="color:#5156be;">{{Auth::user()->membership_id}}</h5>
                        <?php $state = DB::table('states_provinces')->where('state_id',Auth::user()->state)->first(); ?>
                        <strong>
                            <div class="center"> @if($state && $state != "") {{$state->name}},  @endif
                            @foreach ($country as $country)
                                @if($country->country_id == @Auth::user()->country)
                                    <?php $country_name = $country->name; ?>
                                    {{$country->name}}
                                @endif
                            @endforeach
                            </div>
                        </strong>

                    </div>
                    
                    <div class="col-md-7 card">
                        <div class="card-header">
                            <div class="card-title"><h3>Personal Details</h3></div>
                        </div>
                        <div class="card-body">
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">First name: </label>
                                    <span class="form-label" for="formrow-email-input">{{Auth::user()->firstname}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">Last name: </label>
                                    <span class="form-label" for="formrow-email-input">{{Auth::user()->lastname}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">DOB: </label>
                                    <span class="form-label" for="formrow-email-input">{{Auth::user()->dob}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">Gender: </label>
                                    <span class="form-label" for="formrow-email-input">{{Auth::user()->gender}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">Country: </label>
                                    <span class="form-label" for="formrow-email-input">{{$country_name}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">State: </label>
                                    <span class="form-label" for="formrow-email-input">{{$state->name}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">Member ID: </label>
                                    
                                        @if(Auth::user()->membership_id == '') 
                                        <span class="form-label" style="color:red;" for="formrow-email-input">Not Available
                                        @else
                                        <span class="form-label" for="formrow-email-input">{{Auth::user()->membership_id}}
                                        @endif
                                    </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">Nationality: </label>
                                    <span class="form-label" for="formrow-email-input">{{Auth::user()->nationality}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">Email ID: </label>
                                    <span class="form-label" for="formrow-email-input">{{Auth::user()->email}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">Phone : </label>
                                    <span class="form-label" for="formrow-email-input">{{Auth::user()->mobile}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">National ID Number : </label>
                                    <span class="form-label" for="formrow-email-input">{{Auth::user()->national_id}} </span>
                                </div>
                                <div>
                                    <label class="form-label col-md-3" for="formrow-email-input">National ID Photo : </label>
                                    <img src="/images/{{Auth::user()->national_photo}}" width="80px"> <a href="/images/{{Auth::user()->national_photo}}" target="_blink">View</a>

                                </div>
                        </div>
                        
                    </div>
                    
            </div>
            <div class="row">
                <div class="card col-md-6">
                    <div class="card-header">
                        <div class="card-title"><h3>Organization Details</h3></div>
                    </div>
                    <div class="card-body ">
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">Organization : </label>
                            <span class="form-label" for="formrow-email-input">
                            @foreach ($organization as $organization)
                                 @if($organization->id == @Auth::user()->organization)
                                    {{$organization->organization_name}}
                                 @endif
                            @endforeach
                            </span>
                        </div>
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">Org Position : </label>
                            <span class="form-label" for="formrow-email-input">
                            @foreach ($category as $category)
                            @if($category->id == @Auth::user()->porganization)
                            {{$category->name}}
                            @endif
                            @endforeach
                            </span>
                        </div>
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">Position in CCS : </label>
                            <span class="form-label" for="formrow-email-input">
                            @foreach ($position as $position)
                            @if($position->id == @Auth::user()->norganization)
                            {{$position->name}}
                            @endif
                            @endforeach
                            </span>
                        </div>
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">Qualification : </label>
                            <span class="form-label" for="formrow-email-input">
                            @foreach ($education as $education)
                            @if($education->id == @Auth::user()->qualification)
                            {{$education->name}}
                            @endif
                            @endforeach
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-header">
                        <div class="card-title"><h3>Bank Details</h3></div>
                    </div>
                    <div class="card-body">
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">Bank Name : </label>
                            <span class="form-label" for="formrow-email-input">{{Auth::user()->bank_name}} </span>
                        </div>
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">Bank Holder Name : </label>
                            <span class="form-label" for="formrow-email-input">{{Auth::user()->bank_holder_name}} </span>
                        </div>
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">Account Number : </label>
                            <span class="form-label" for="formrow-email-input">{{Auth::user()->account_number}} </span>
                        </div>
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">IFSC Code : </label>
                            <span class="form-label" for="formrow-email-input">{{Auth::user()->ifsc_code}} </span>
                        </div>
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">Swift Code : </label>
                            <span class="form-label" for="formrow-email-input">{{Auth::user()->swift_code}} </span>
                        </div>
                        <div>
                            <label class="form-label col-md-3" for="formrow-email-input">IABN Number : </label>
                            <span class="form-label" for="formrow-email-input">{{Auth::user()->iban_number}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
 </div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   

@endsection

