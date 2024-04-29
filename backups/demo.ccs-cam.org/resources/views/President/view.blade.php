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
                                        <h4 class="card-title">President Message</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/president/message/store" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">President Name</label>
                                                                    <input type="text" class="form-control" name="president_name" id="formrow-email-input" value="{{$data->president_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">President Photo <a target="_blank" href="/images/{{$data->about_us_image}}">View</a></label>
                                                                    <input type="file" class="form-control" name="president_image" id="formrow-email-input" value="{{$data->president_image}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-password-input">President Message</label>
                                                                    <textarea name="president_description" class="form-control" id="editor1" rows="10" cols="50">
                                                                        {{$data->president_description}}
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
@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>
@endsection

