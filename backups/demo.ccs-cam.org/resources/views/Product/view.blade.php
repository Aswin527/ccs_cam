@extends('layouts.header')
@section('title','View Categories')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-eye"></i>
                    View Products
                    <a href="" class="badge badge-danger" data-toggle="modal" data-target="#importModal">
                        <i class="fas fa-plus"></i>
                        Import Excel
                    </a>
                </div>
                <div class="card-body">
                    @if ( Session::has('flash_message') )
                        <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                            <b>{{ Session::get('flash_message') }}</b>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    <form method="POST" action="{{ url('/home/products/view/search') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-12">
                                <input type="text" name="pname" class="form-control" placeholder="Enter Product" required>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <button type="submit" class="btn btn-outline-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(count($products)>0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        
                                        <th>Slug</th>
                                        @if(Auth::User()->id==1)
                                         <th>Posted By</th>
                                         @endif
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>
                                                @foreach ($item->categories as $item2)
                                                    <span class="badge badge-primary">{{$item2->name}}</span>
                                                @endforeach
                                            </td>
                                            <td>{{$item->name}}</td>
                                             <td>{{$item->price}}</td>
                                            <td>{{$item->slug}}</td>
                                            @if(Auth::User()->id==1)
                                            <td>{{$item->username}}</td>
                                         @endif
                                            <td>
                                                @if($item->status)
                                                    <a href="/home/products/change-status/{{ $item->id }}" onclick="return confirm('Are you sure you want to change status of this Product?')" class="badge badge-success">Active</a>
                                                @else
                                                    <a href="/home/products/change-status/{{ $item->id }}" onclick="return confirm('Are you sure you want to change status of this Product?')" class="badge badge-danger">Inactive</a>
                                                @endif    
                                            </td>
                                            <td>
                                                <a href="/home/products/edit/{{ $item->id }}" class="badge badge-primary"><i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$products->links()}}
                    @else
                        <h6>No Products Found.</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal')
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/home/products/view/import') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="document" class="col-md-4 col-form-label text-md-right">Select Excel*</label>
                            <div class="col-md-6">
                                <input id="document" type="file" name="document" required>
                            </div>
                        </div>
                        <h6 style="color:red;">
                            Excel File:<br>
                            Order - Category, Name, Description, Packing, Price, Composition, Slug.<br>
                            Do Not add any heading line.<br>
                            Incase of no value add null in the column.<br>
                        </h6>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    Import Products
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection