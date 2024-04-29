@extends('layouts.header')
@section('title','Add Page')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-plus"></i>
                    Add Page
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/home/pages/add/store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <textarea name="description" id="description" required ></textarea>
                        <br>
                        <div class="form-group row">
                            <label for="cid" class="col-md-3 col-form-label text-md-right">{{ __('Select Category*') }}</label>
                            <div class="col-md-6">
                                <select id="cid" class="form-control" name="category" required>
                                    <option value=""> --Select Category*-- </option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name*') }}</label>
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
                            <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Image*') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" name="image" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_title" class="col-md-3 col-form-label text-md-right">{{ __('Meta Title*') }}</label>
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
                            <label for="meta_keyword" class="col-md-3 col-form-label text-md-right">{{ __('Meta Keyword*') }}</label>
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
                            <label for="meta_description" class="col-md-3 col-form-label text-md-right">{{ __('Meta Description*') }}</label>
                            <div class="col-md-6">
                                <textarea id="meta_description" type="text" class="form-control" name="meta_description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-md-3 col-form-label text-md-right">{{ __('Slug*') }}</label>
                            <div class="col-md-6">
                                <input id="slug" type="text" class="form-control text-lowercase @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>
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
                                    Add Page
                                </button>
                            </div>
                        </div>
                    </form>
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