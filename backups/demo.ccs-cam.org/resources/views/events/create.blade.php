@extends('layouts.admin')
@section('title','Event | Home')
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
                                        <h4 class="card-title">Event Add</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/our/event/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Event Name</label>
                                                                    <input type="text" class="form-control" name="event_name" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Location of Event</label>
                                                                    <input type="text" class="form-control" name="location_event" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Date OF Events</label>
                                                                    <input type="date" class="form-control" name="date" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Image of Event</label>
                                                                    <input type="file" class="form-control" name="image_event" id="formrow-email-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Iframe Location</label>
                                                                    <textarea class="form-control" name="iframe" id="formrow-email-input">
                                                                        
                                                                    </textarea>
                                                                 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">About of Event</label>
                                                                    <textarea class="form-control" name="about_event" id="formrow-email-input">
                                                                        
                                                                    </textarea>
                                                                 
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