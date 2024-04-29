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
<br><br><br>
<h1 style="text-align: center">{{ $category->name }}</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-12">
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
                <div class="col-lg-9 col-md-12">
                    @if(count($blogs) == 0)
                        <h6>No Blogs Found.</h6>
                    @else
                        <div class="row">
                            @foreach ($blogs as $item)
                                <div class="col-lg-4 col-md-12">
                                    <a href="{{ $item->slug }}" class="card">
                                        <img src="/public/images/blog/{{ $item->image }}" class="card-img-top" alt="citriclabs|{{ $item->name }} ">
                                        <div class="card-body">
                                            <h6>{{ $item->name }}</h6>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        {{ $blogs->links() }}
                    @endif
                </div>
            </div>
            @if($category->description)
                <?php 
                    echo html_entity_decode($category->description);
                ?>
            @endif
        </div>
    </div>
</div>
<br>
@endsection