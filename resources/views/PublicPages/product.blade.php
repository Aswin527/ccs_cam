@extends('layouts.app')
@section('meta_title',$product->meta_title)
@section('meta_keywords',$product->meta_keyword)
@section('meta_description',$product->meta_description)
@section('meta_image')
    @if($product->image)
        content="{{ Request::root() }}/storage/{{$product->image}}"
    @else
        content="{{ Request::root() }}/images/logo-2.png"
    @endif
@endsection
@section('content')
<section class="hero desktop-pdding">
<div class="container">
<div class="row">
<div class="col-md-6 mx-auto text-center fadeInLeft wow" style="visibility: visible; animation-name: fadeInLeft;">
<h1 class="text-capitalize white mb-md-0"><b>{{ $product->name}}</b></h1>

<nav aria-label="breadcrumb" class="mt-md-4 mt-3 sticky">
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="/{{ $product->name}}">Product</a></li>
	<li aria-current="page" class="breadcrumb-item text-capitalize">{{ $product->name}}</li>
</ol>
</nav>
</div>
</div>
</div>
</section>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="row">
                            <div class="col-lg-6">
                                @if( $product->image)
                                <img alt="/{{ $product->name}}" class="xzoom" src="/{{ $product->image }}"  width="100%" >
                                @else
                                 <img alt="/{{ $product->name}}" class="xzoom" src="{{asset('product-image-dummy.jpg')}}"  width="100%" >
                                 @endif
                            </div>
                            <div class="col-lg-6 product-col">
							<h1>{{ $product->name }}</h1>
                                @if ( Session::has('flash_message') )
                                    <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                                        <b>{{ Session::get('flash_message') }}</b>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                                <p><b>Composition :</b> {{ $product->composition }}</p>
                                <p><b>Packing :</b> {{ $product->packing }}</p>
                               
                                <a href="" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">Quick Enquiry</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
						<div class="sidebar sid-design">
                        <h4 style="text-align: center">See More</h4>
                        <div class="list-group">
                            @foreach ($products as $item)
                                <a href="{{ $item->slug }}" class="list-group-item list-group-item-action">
                                    {{ $item->name }}
                                </a>
                            @endforeach
                        </div>
						</div>
                        <br><br>
						<div class="sidebar-from">
						    <div class="catform">
						        <h5 class="text-center">Contact Us</h5>
                        <form action="{{ url('/enquiry/store') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Name*" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="enquiry" type="text" class="form-control" readonly name="enquiry" placeholder="Enquiry*" value="Enquiry about {{ $product->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" placeholder="Email*" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="phone" type="text" class="form-control" name="phone" pattern="[789][0-9]{9}" alt="start with 789 digits" placeholder="Phone no*" required>
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="location" type="text" class="form-control" name="location" placeholder="Location*" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" placeholder="Message*" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-info">
                                        Submit Enquiry
                                    </button>
                                </div>
                            </div>
                        </form>
						</div>
						</div>
                    </div>
                </div>
                <?php
                    echo html_entity_decode($product->description);
                ?>
            </div>
        </div>
    </div>
<br>
@endsection
@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/enquiry/store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Name*" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="enquiry" type="text" class="form-control" readonly name="enquiry" placeholder="Enquiry*" value="Enquiry about {{ $product->name }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="text" class="form-control" name="email" placeholder="Email*" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control" name="phone" placeholder="Phone no*" required>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="location" type="text" class="form-control" name="location" placeholder="Location*" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" placeholder="Message*" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-info">
                                    Submit Enquiry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection