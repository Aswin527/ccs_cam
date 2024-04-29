@extends('layouts.header')
@section('title','Add Division')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-plus"></i>
                    Add Division
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/home/division/add/store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (count($errors) > 0)
                            <div class = "alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image*') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" name="image" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description*') }}</label>
                            <div class="col-md-8">
                                <textarea name="description" id="description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_title" class="col-md-4 col-form-label text-md-right">{{ __('Meta Title*') }}</label>
                            <div class="col-md-6">
                                <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{ old('meta_title') }}" required autocomplete="meta_title" autofocus>
                                @error('meta_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_keyword" class="col-md-4 col-form-label text-md-right">{{ __('Meta Keyword*') }}</label>
                            <div class="col-md-6">
                                <input id="meta_keyword" type="text" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" value="{{ old('meta_keyword') }}" required autocomplete="meta_keyword" autofocus>
                                @error('meta_keyword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('Meta Description*') }}</label>
                            <div class="col-md-6">
                                <textarea id="meta_description" type="text" class="form-control" name="meta_description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Slug*') }}</label>
                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>
                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    Add Division
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    @if ( Session::has('flash_message') )
                        <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                            <b>{{ Session::get('flash_message') }}</b>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    @if(count($divisions)>0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($divisions as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td>
                                                @if($item->status)
                                                    <a href="/home/division/change-status/{{ $item->id }}" onclick="return confirm('Are you sure you want to change status of this Division?')" class="badge badge-success">Active</a>
                                                @else
                                                    <a href="/home/division/change-status/{{ $item->id }}" onclick="return confirm('Are you sure you want to change status of this Division?')" class="badge badge-danger">Inactive</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="/home/division/edit/{{ $item->id }}" class="badge badge-primary division"><i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h6>No Divisions Found.</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('JS')
<script>
    $('#name').focusout(function(){
        var slug=$(this).val();
        slug=slug.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
        if(slug[slug.length - 1]=="-"){
            slug=slug.slice(0,[slug.length - 1]);
        }
        $('#slug').val(slug);
    });
</script>
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection