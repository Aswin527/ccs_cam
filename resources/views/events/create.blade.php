@extends('layouts.admin')
@section('title', 'Event | Home')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Flash Message -->
            @if (Session::has('flash_message'))
                <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                    <b>{{ Session::get('flash_message') }}</b>
                </div>
            @endif

            <!-- Card Header -->
            <div class="card-header">
                <h4 class="card-title">Event Add</h4>
            </div>

            <!-- Card Body -->
            <div class="card-body p-4">
                <form action="/home/our/event/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Event Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="event_name">Event Name</label>
                                <input type="text" class="form-control" name="event_name" id="event_name">
                            </div>
                        </div>

                        <!-- Location of Event -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="location_event">Location of Event</label>
                                <input type="text" class="form-control" name="location_event" id="location_event">
                            </div>
                        </div>

                        <!-- Date of Events -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="date">Date of Events</label>
                                <input type="date" class="form-control" name="date" id="date">
                            </div>
                        </div>

                        <!-- Image of Event -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="image_event">Image of Event</label>
                                <input type="file" class="form-control" name="image_event" id="image_event">
                            </div>
                        </div>

                        <!-- Iframe Location -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="iframe">Iframe Location</label>
                                <textarea class="form-control" name="iframe" id="iframe"></textarea>
                            </div>
                        </div>

                        <!-- About the Event -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="about_event">About the Event</label>
                                <textarea class="form-control" name="about_event" id="about_event"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
