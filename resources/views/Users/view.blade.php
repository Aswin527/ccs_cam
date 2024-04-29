@extends('layouts.header')
@section('title','View Users')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-eye"></i>
                    View Users
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
                    @if(count($users)>0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{$item->firstname}}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{$item->mobile}}</td>
                                            <td>
                                                @if($item->status)
                                                    <a href="/home/users/change-status/{{ $item->id }}" onclick="return confirm('Are you sure you want to change status of this User?')" class="badge badge-success">Active</a>
                                                @else
                                                    <a href="/home/users/change-status/{{ $item->id }}" onclick="return confirm('Are you sure you want to change status of this User?')" class="badge badge-danger">Inactive</a>
                                                @endif    
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$users->links()}}
                    @else
                        <h6>No Users Found.</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection