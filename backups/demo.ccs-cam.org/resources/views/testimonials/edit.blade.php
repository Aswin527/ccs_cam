@extends('layouts.admin')
@section('title','Add Category')
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
                                        <h4 class="card-title">Edit Slider</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="{{ url('/home/testimonials/update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Title</label>
                                    <input type="text" class="form-control" name="name" value="{{ $data->name}}"
                                        id="formrow-email-input">
                                        <input type="hidden" class="form-control" name="id" value="{{ $data->id}}"
                                        id="formrow-email-input">
                                </div>
                            </div>
                            
                           
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Designation</label>
                                    <input type="text" class="form-control" name="designation" value="{{ $data->designation}}" id="formrow-email-input">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Upload Image</label>
                                    <input type="file" class="form-control" name="image" id="formrow-password-input" value="{{ $data->image}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Description</label>
                                    
                                    <textarea class="form-control" name="description" id="formrow-password-input">
                                        {{ $data->description}}
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
@section('JS')
<script>
    $('#name').focusout(function () {
        var slug = $(this).val();
        slug = slug.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
        if (slug[slug.length - 1] == "-") {
            slug = slug.slice(0, [slug.length - 1]);
        }
        $('#slug').val(slug);
    });
</script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection