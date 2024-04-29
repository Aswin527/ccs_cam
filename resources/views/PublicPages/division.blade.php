@extends('layouts.app')
@section('meta_title',$division->meta_title)
@section('meta_keywords',$division->meta_keyword)
@section('meta_description',$division->meta_description)
@section('meta_image')
    @if($division->image)
        content="{{ Request::root() }}/storage/{{$division->image}}"
    @else
        content="{{ Request::root() }}/images/logo-2.png"
    @endif
@endsection
@section('content')
@if($division->image)
    <img src="/storage/{{$division->image}}">
@endif
<br><br><br>
<h1 style="text-align: center">{{ $division->name }}</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @if($division->description)
                        <?php 
                            echo html_entity_decode($division->description);
                        ?>
                    @endif
                </div>
                <div class="col-lg-4 col-md-12">
                    <h6>Please Contact Us</h6><br>
                    <form action="{{ url('/enquiry/store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Name*" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="enquiry" type="text" class="form-control" readonly name="enquiry" placeholder="Enquiry*" value="Enquiry about {{ $division->name }}" required>
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
                            <label class="col-md-4 col-form-label text-md-right">GST*</label>
                            <label class="col-md-4 col-form-label text-md-right">
                                <input type="radio" name="gst" value="1" id=""> Yes
                            </label>
                            <label class="col-md-4 col-form-label text-md-right">
                                <input type="radio" name="gst" value="0" id="" checked> No
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-6 col-form-label text-md-right">Drug Liscence*</label>
                            <label class="col-md-3 col-form-label text-md-right">
                                <input type="radio" name="drug" value="1" id=""> Yes
                            </label>
                            <label class="col-md-3 col-form-label text-md-right">
                                <input type="radio" name="drug" value="0" id="" checked> No
                            </label>
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
</div>
<br>
@endsection