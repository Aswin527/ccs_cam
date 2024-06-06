@extends('layouts.app')
@section('title', 'Mark Attendance')
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
                <h4 class="card-title">Mark Attendance for {{ $event->event_name }}</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('attendance.mark.store', $event->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="member_id">Member ID</label>
                        <input type="text" class="form-control" name="member_id" id="member_id" required>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Mark Attendance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
