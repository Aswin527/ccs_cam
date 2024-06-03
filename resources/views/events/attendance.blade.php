@extends('layouts.app')
@section('title', 'Mark Attendance')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ $event->event_name }} - Mark Attendance</div>
                <div class="card-body">
                    <form action="{{ route('event.markAttendance', $event->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="member_id" class="form-label">Member ID</label>
                            <input type="text" class="form-control" id="member_id" name="member_id" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Mark Attendance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
