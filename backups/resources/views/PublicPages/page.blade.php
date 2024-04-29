@extends('layouts.app')
@section('meta_title',$page->meta_title)
@section('meta_keywords',$page->meta_keyword)
@section('meta_description',$page->meta_description)
@section('meta_image')
    @if($page->image)
        content="{{ Request::root() }}/storage/{{$page->image}}"
    @else
        content="{{ Request::root() }}/images/logo-2.png"
    @endif
@endsection
@section('content') 
<!--@if($page->image)-->
<!--    <img src="/storage/{{$page->image}}" alt="">-->
<!--@endif-->
<div class="content">
            <?php
                echo html_entity_decode($page->description);
            ?>
        </div>
@endsection