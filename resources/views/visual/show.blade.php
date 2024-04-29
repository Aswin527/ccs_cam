@extends('layouts.header')
@section('title','View Gallery')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-eye"></i>
                    View Visual
                </div>
                <div class="card-header">
                  
                    <form action="/search-gallery" method="GET" class="form-inline">
                         <div class="row">
                          <div class="col-lg-6 col-md-12">
                        <input class="form-control" type="search" name="query"></div>
                          <div class="col-lg-6 col-md-12">
                         <button type="submit" class="btn btn-success">Search</button></div></div>
                    </form>
                </div>
                <div class="card-body">
                   
                 
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover datatable datatable-User">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Visual Name</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gallery as $item)
                                        <tr>

                                            <td>{{$item->name}}</td>
                                            <td>{{$item->visualname}}</td>
                                            <td><img src="/public/visual/{{$item->image}}" width="200px" alt=""></td>
                                            
                                            <td>
                                                <a href="/home/visual/edit/{{ $item->id }}" class="badge badge-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="/home/visual/delete/{{ $item->id }}" class="badge badge-primary"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$gallery->links()}}
                        </div>
                       
                   
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection