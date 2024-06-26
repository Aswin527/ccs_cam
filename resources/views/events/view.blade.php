@extends('layouts.admin')

@section('title', 'Event | Home')

@section('content')
<style>
    .word-wrap {
        border:none;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Events</h4>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Event Name</th>
                            <th>Event Location</th>
                            <th>Event About</th>
                            <th>Image</th>
                            <th>QR Code</th>
                            <th>Participants</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td width="200">{{ $event->event_name }}</td>
                                <td>{{ $event->location_event }}</td>
                                <td><textarea class="word-wrap" cols="30" rows="3" readonly>{{ $event->about_event }}</textarea></td>
                                <td>
                                    <a href="/images/{{ $event->image_event }}" target="_blank" class="btn btn-success">View</a>
                                </td>
                                <td>
                                    <a href="/{{ $event->qr_code }}" target="_blank" class="btn btn-success">View</a>
                                </td>
                                <td>
                                    <a href="/home/event/participants/{{ $event->id }}" class="btn btn-primary waves-effect ">
                                         View Participants
                                    </a>
                                </td>
                                <td class="action-btn">
                                    <a href="/home/event/delete/{{ $event->id }}" class="btn btn-danger waves-effect btn-label waves-light">
                                        <i class="mdi mdi-trash-can label-icon"></i> Delete
                                    </a>
                                    <a href="/home/event/edit/{{ $event->id }}" class="btn btn-warning waves-effect btn-label waves-light">
                                        <i class="bx bx-edit-alt label-icon"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
