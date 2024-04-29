@extends('layouts.admin')
@section('title','Edit Category')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-pencil-alt"></i>
                    Edit Publication
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/home/categories/update') }}" enctype="multipart/form-data">
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
                        <div class="form-group row mb-4">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name*') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                              
                                    <label class="col-md-2 col-form-label text-md-right" for="formrow-email-input">Type</label>
                                    <div class="col-md-10">
                                        <select id="type" class="form-control" name="type" id="formrow-email-input">
                                        <option value=""> --Select Type*-- </option>
                                        @if($category->type == "Bulletin of CCS")
                                        <option value="Bulletin of CCS" selected>Bulletin of CCS</option>
                                        <option value="Journal of CCS">Journal of CCS</option>
                                        @else
                                         <option value="Bulletin of CCS" >Bulletin of CCS</option>
                                        <option value="Journal of CCS" selected>Journal of CCS</option>
                                        @endif
                                        
                                       
                                    </select>
                                    </div>
                                    
                               
                            </div>
                        
                        <br>
                        <div class="form-group row mb-4">
                            <label for="image" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-10">
                                <input id="image" type="file" name="image" value="{{ $category->image }}">
                            </div>
                        </div>
                         <div class="form-group row mb-4">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Volume*') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="volume" vrequired autocomplete="name" autofocus value="{{ $category->volume }}">
                               
                            </div>
                        </div>
                         <div class="form-group row mb-4">
                            <label for="image" class="col-md-2 col-form-label text-md-right">{{ __('Upload PDF URL') }}</label>
                            <div class="col-md-10">
                                <input id="image" type="text" name="pdf" value="{{ $category->pdf }}">
                            </div>
                        </div>
                         <div class="form-group row mb-4">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Year*') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="date" value="{{ $category->date }}" required autocomplete="name" autofocus>
                               
                            </div>
                        </div>
                       
                        <div class="form-group row mb-4">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Issue*') }}</label>
                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('issue') is-invalid @enderror" name="issue" value="{{ $category->issue }}" required autocomplete="name" autofocus>
                               
                            </div>
                        </div>
                       
                       
                        <input type="hidden" name="cid" id="cid" value="{{ $category->id }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    Edit Publication
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
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description',{           
            fullPage: true,
            allowedContent: true,
            autoGrow_onStartup: true,
            enterMode: CKEDITOR.ENTER_BR});
    </script>
@endsection