@extends('layouts.admin')
@section('title','Position in Organization | Home')
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
                                        <h4 class="card-title">Update Country</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/country/update" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Country</label>
                                                                    <input type="text" class="form-control" name="position" id="formrow-email-input" value="{{$data->name}}">
                                                                    <input type="hidden" class="form-control" name="id" id="formrow-email-input" value="{{$data->id}}">
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