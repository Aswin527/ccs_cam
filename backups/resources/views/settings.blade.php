@extends('layouts.admin')
@section('title','Settings | Home')
@section('content')
<div class="row">
                            <div class="col-12">
                                <div class="card">
                                     @if ( Session::has('flash_message') )
                        <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                            <b>{{ Session::get('flash_message') }}</b>
                          
                        </div>
                    @endif
                                    <div class="card-header">
                                        <h4 class="card-title">All Settingsr</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/settings/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">About Title</label>
                                                                    <input type="text" class="form-control" name="aboutus_title" id="formrow-email-input" value="{{$data->aboutus_title}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">About Image <a target="_blank" href="/images/{{$data->about_us_image}}">View</a></label>
                                                                    <input type="file" class="form-control" name="about_us_image" id="formrow-email-input" value="{{$data->about_us_image}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Aboutus Description</label>
                                                                    <textarea name="aboutus_description" class="form-control" id="editor1" rows="10" cols="50">
                                                                        {{$data->aboutus_description}}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">                                                            
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Mission Title</label>
                                                                    <input type="text" class="form-control" name="our_mission" id="formrow-email-input" value="{{$data->our_mission}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Mission Description</label>
                                                                    <textarea name="our_mission_description" class="form-control" id="editor1" rows="10" cols="50" >
                                                                        {{$data->our_mission_description}}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">                                                            
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Vision Title</label>
                                                                    <input type="text" class="form-control" name="our_vission" id="formrow-email-input" value="{{$data->our_vission}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Vision Description</label>
                                                                    <textarea name="our_vission_description" class="form-control" id="editor1" rows="10" cols="50">
                                                                        {{$data->our_vission_description}}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">                                                            
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Objective Title</label>
                                                                    <input type="text" class="form-control" name="objective_title" id="formrow-email-input" value="{{$data->objective_title}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Objective Description</label>
                                                                    <textarea name="objective_description" class="form-control" id="editor1" rows="10" cols="50">
                                                                        {{$data->objective_description}}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Green Title</label>
                                                                    <input type="text" class="form-control" name="green_title" id="formrow-email-input" value="{{$data->green_title}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Green BG Image  <a target="_blank" href="/images/{{$data->green_image}}">View</a></label>
                                                                    <input type="file" class="form-control" name="green_image" id="formrow-email-input" value="{{$data->green_image}}">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="row">                                                            
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Email</label>
                                                                    <input type="text" class="form-control" name="email" id="formrow-email-input" value="{{$data->email}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Phone Number</label>
                                                                    <input type="text" class="form-control" name="phone" id="formrow-email-input" value="{{$data->phone}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Address</label>
                                                                    <input type="text" class="form-control" name="address" id="formrow-email-input" value="{{$data->address}}">
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
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>
@endsection

