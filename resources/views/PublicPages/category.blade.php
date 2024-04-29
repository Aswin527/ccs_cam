@extends('layouts.app')
@section('meta_title',$category->meta_title)
@section('meta_keywords',$category->meta_keyword)
@section('meta_description',$category->meta_description)
@section('meta_image')
    @if($category->image)
        content="{{ Request::root() }}/storage/{{$category->image}}"
    @else
        content="{{ Request::root() }}/images/logo-2.png"
    @endif
@endsection
@section('content')
@if($category->image)
    <img src="/storage/{{$category->image}}">
@endif

<section class="hero desktop-pdding">
<div class="container">
<div class="row">
<div class="col-md-6 mx-auto text-center fadeInLeft wow" style="visibility: visible; animation-name: fadeInLeft;">
<h1 class="text-capitalize white mb-md-0"><b>{{ $category->name }}</b></h1>

<nav aria-label="breadcrumb" class="mt-md-4 mt-3 sticky">
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="/{{ $category->name }}">Category</a></li>
	<li aria-current="page" class="breadcrumb-item text-capitalize">{{ $category->name }}</li>
</ol>
</nav>
</div>
</div>
</div>
</section>
<br>
<!--<h1 style="text-align: center">{{ $category->name }}</h1> -->
<div class="container cat">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-12">
				<div class="sidebar-cat">
                    <h4 style="text-align: center">All Categories</h4>
                    <div class="list-group">
                        @foreach ($categories as $item)
                            @if($category->id == $item->id)
                                <a href="{{ $item->slug }}" class="list-group-item list-group-item-action active">
                                    {{ $item->name }}
                                </a>
                            @else
                                <a href="{{ $item->slug }}" class="list-group-item list-group-item-action">
                                    {{ $item->name }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
				
				</div>
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                      
                           <div class="table-responsives">
                            <table class="table table-bordered table-striped table-hover datatable datatable-User myTable">
                                <thead>
                                    <tr>
                                       
                                        
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Composition</th>
                                         
                                        <th>Packing Size</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($products as $item)
                                        <tr>
                                            
                                              <td>@if($item->image)
                                              <img src="/{{$item->image}}" width="100px">
                                              @else
                                              <img src="/public/front_asset/images/p-demo.jpg" width="100px">
                                              @endif</td>
                                            
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->composition }}</td>
                                            <td>
                                                {{ $item->packing }}   
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    {{$products->Links()}}

                      
                    </div>
                    </div></div></div></div></div>
            </div>
            
        </div>
    </div>
</div>
<!-- Modal Product Image -->
<div id="myModal" class="modal fade cat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img class="" src="#"/ alt="goadse">
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Gallery Image -->
<div id="myModals" class="modal fade cat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img class="" src="#"/ alt="goadse">
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@endsection




