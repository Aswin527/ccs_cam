@extends('layouts.admin')
@section('title', 'Event | Home')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            @if (Session::has('flash_message'))
                <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                    <b>{{ Session::get('flash_message') }}</b>
                </div>
            @endif
            <div class="card-header">
                <h4 class="card-title">Event Add</h4>
            </div>
            <div class="card-body p-4">
                <form action="/home/our/event/store" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="event_name">Event Name</label>
                                <input type="text" class="form-control" name="event_name" id="event_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="location_event">Location of Event</label>
                                <input type="text" class="form-control" name="location_event" id="location_event">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="date">Date Of Events</label>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="image_event">Image of Event</label>
                                <input type="file" class="form-control" name="image_event" id="image_event">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="iframe">Iframe Location</label>
                                <textarea class="form-control" name="iframe" id="iframe"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="about_event">About the Event</label>
                                <textarea class="form-control" name="about_event" id="about_event"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>

                @if(isset($event))
                    <div class="mt-4">
                        <h4>QR Code for Attendance</h4>
                        {!! QrCode::size(250)->generate(route('event.attendance', $event->id)) !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
