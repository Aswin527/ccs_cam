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
                                        <h4 class="card-title">Edit Gallery Image</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="/home/gallery/update" method="post" enctype="multipart/form-data">
                                            @csrf             
            
                                                        <div class="row">                                                            
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Name</label>
                                                                    <input type="text" class="form-control" name="name" id="formrow-email-input" value="{{$gallery->name}}">
                                                                     <input type="hidden" class="form-control" name="id" id="formrow-email-input" value="{{$gallery->id}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="formrow-email-input">Image <img src="/images/{{$gallery->image}}" width="20px"></label>
                                                                    <input type="file" class="form-control" name="image" id="formrow-email-input" value="{{$gallery->image}}">
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

