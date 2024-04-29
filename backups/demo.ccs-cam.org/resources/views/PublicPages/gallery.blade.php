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
    <br><br><br>
    @if($category->image)
        <img src="/storage/{{$category->image}}" alt="">
    @endif
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach ($images as $item)
                    <div class="col-md-4 col-12">
                        <a href="">
                            <img src="/storage/{{ $item->image}}" class="img-fluid mx-auto d-block border space" alt="">
                        </a>    
                    </div>
                @endforeach
                {{$images->links()}}
            </div>
        </div>
    </div>
    <br>
@endsection