@extends('layouts.header')
@section('title','View Pages')
@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-eye"></i>
                    View Pages
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
                    @if(count($pages)>0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $item)
                                        <tr>
                                            <td>
                                                <span class="badge badge-primary">{{$item->category->name}}</span>
                                            </td>
                                            <td>{{$item->name}}</td>
                                            <td><img src="/storage/{{$item->image}}" width="200px" alt=""></td>
                                            <td>{{$item->slug}}</td>
                                            <td>
                                                @if($item->status)
                                                    <a href="/home/pages/change-status/{{ $item->id }}" onclick="return confirm('Are you sure you want to change status of this Blog?')" class="badge badge-success">Active</a>
                                                @else
                                                    <a href="/home/pages/change-status/{{ $item->id }}" onclick="return confirm('Are you sure you want to change status of this Blog?')" class="badge badge-danger">Inactive</a>
                                                @endif    
                                            </td>
                                            <td>
                                                <a href="/home/pages/edit/{{ $item->id }}" class="badge badge-primary"><i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$pages->links()}}
                    @else
                        <h6>No Pages Found.</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection