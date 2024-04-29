@extends('layouts.app')
@section('meta_title',$blog->meta_title)
@section('meta_keywords',$blog->meta_keyword)
@section('meta_description',$blog->meta_description)
@section('meta_image')
    @if($blog->image)
        content="{{ Request::root() }}/storage/{{$blog->image}}"
    @else
        content="{{ Request::root() }}/images/logo-2.png"
    @endif
@endsection
@section('content')

<br><br><br>
    <h1 style="text-align: center">{{ $blog->name }}</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <img src="/public/images/blog//{{ $blog->image }}" width="100%" alt="citriclabs | {{ $blog->name }}">
                                <?php
                                    echo html_entity_decode($blog->description);
                                ?>
                            </div>
                        </div>
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
                                    <input id="enquiry" type="text" class="form-control" readonly name="enquiry" placeholder="Enquiry*" value="Enquiry about {{ $blog->name }}" required>
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
@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please Contact Us</h5>
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
                                <input id="enquiry" type="text" class="form-control" readonly name="enquiry" placeholder="Enquiry*" value="Enquiry about {{ $blog->name }}" required>
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
                            <label class="col-md-2 col-form-label text-md-right">GST*</label>
                            <label class="col-md-2 col-form-label text-md-right">
                                <input type="radio" name="gst" value="1" id=""> Yes
                            </label>
                            <label class="col-md-2 col-form-label text-md-right">
                                <input type="radio" name="gst" value="0" id="" checked> No
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Drug Liscence*</label>
                            <label class="col-md-2 col-form-label text-md-right">
                                <input type="radio" name="drug" value="1" id=""> Yes
                            </label>
                            <label class="col-md-2 col-form-label text-md-right">
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
@endsection