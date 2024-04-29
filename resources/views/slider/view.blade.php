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
                                        <h4 class="card-title">Add Slider</h4>
                                    </div>
                                    <div class="card-body p-4">
        
                                        <form action="{{ url('/home/slider/store') }}" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                        id="formrow-email-input">
                                </div>
                            </div>
                            
                           
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-email-input">Subtitle</label>
                                    <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}" id="formrow-email-input">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="formrow-password-input">Upload Image</label>
                                    <input type="file" class="form-control" name="image" id="formrow-password-input">
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
                        
                        
                        
                        
                        
         <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Slider</h4>
                                    </div>
                                    <div class="card-body">
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Sr.</th>
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php $x=1;?>
                                                @foreach($data as $data)
                                                    <tr>
                                                        <td>{{$x}}</td>
                                                        <td>{{$data->title}}</td>
                                                        <td>{{$data->subtitle}}</td>
                                                        <td><img src="/images/{{$data->image}}" width="100px"></td>
                                                        <td><a href="/home/slider/delete/{{$data->id}}" class="btn btn-danger waves-effect btn-label waves-light"><i class="mdi mdi-trash-can label-icon"></i> Delete</a>
                                                        <a href="/home/slider/edit/{{$data->id}}" class="btn btn-warning waves-effect btn-label waves-light"><i class=" bx bx-edit-alt label-icon"></i> Edit</a>
                                                        </td>
                                                       
                                                    </tr>
                                                    <?php $x++; ?>
                                            @endforeach
                                           
                                            </tbody>
                                        </table>
        
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