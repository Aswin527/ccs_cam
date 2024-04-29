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
                                    <div class="card-header">
                                        <h4 class="card-title">Edit Partner</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/admin/our/partner/update" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Name</label>
                                                                    <input type="text" class="form-control" name="title" id="formrow-email-input" value="{{$partner->name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">Image</label>
                                                                    <input type="file" class="form-control" name="image" id="formrow-password-input" value="{{$partner->image}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                          <input type="hidden" class="form-control" name="id" id="formrow-password-input" value="{{$partner->id}}">
                                                        <div class="mt-4">
                                                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                        </div>
                                                    </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>


@endsection