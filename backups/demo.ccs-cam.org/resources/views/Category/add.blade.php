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
                                        <h4 class="card-title">Add Publications</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="{{ url('/home/categories/add/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                       

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        id="formrow-email-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Type</label>
                                    <select id="type" class="form-control" name="type" id="formrow-email-input">
                                        <option value=""> --Select Type*-- </option>
                                        <option value="Bulletin of CCS">Bulletin of CCS</option>
                                        <option value="Journal of CCS">Journal of CCS</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Cover Image</label>
                                    <input type="file" class="form-control" name="image" id="formrow-password-input">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Volume</label>
                                    <input type="text" class="form-control" name="volume" value="{{ old('volume') }}" id="formrow-email-input">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Issue</label>
                                    <input type="text" class="form-control" name="issue" value="{{ old('issue') }}" id="formrow-email-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Upload PDF URL</label>
                                    <input type="text" class="form-control" name="pdf" id="formrow-password-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Year</label>
                                    <input type="text" class="form-control" name="date" value="{{ old('date') }}" id="formrow-email-input">
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