@extends('layouts.header')
@section('title','Add Image')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-plus"></i>
                    Add Image
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/home/visual/add/store') }}" enctype="multipart/form-data">
                        @csrf
                        <select name="visuals" id="visuals">
                            @foreach($product as $list)
                             
                            
                        <option value="{{$list->id}}">{{$list->name}}</option>
                            
                          @endforeach
                       </select
                       <br>
                        <div class="form-group row">
                            <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Name*') }}</label>
                            <div class="col-md-9">
                                <input id="image" type="text" name="visualname" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Image*') }}</label>
                            <div class="col-md-9">
                                <input id="image" type="file" name="image" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    Add Image
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