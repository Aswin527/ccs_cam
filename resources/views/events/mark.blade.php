@extends('layouts.app')
@section('meta_title','Mark Attendance')
@section('meta_keywords','Mark Attendance')
@section('meta_description','Mark Attendance')
@section('content')

<style>
    .container-aboutus {
        height: 200px;
    }
    .contact-three .container {
        max-width: 1200px;
    }
</style>

<!-- <section class="">
    <div class="container-aboutus">
        <div class="overlay"></div>
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="/">Home</a></li>
                <li><span>></span></li>
                <li class="active">Mark Attendance</li>
            </ul>
            <h2>Mark Attendance</h2>
        </div>
    </div>
</section> -->

<section class="contact-three" style="margin-top: 0px;">
    <div class="contact-three-shape" style="background-image: url(assets/images/shapes/contact-three-shape.png);"></div>
    <div class="container">
        <div class="section-title text-center">
            @if (Session::has('flash_message'))
                <div class="alert alert-{{ Session::get('flash_type') }} alert-dismissible fade show" role="alert">
                    <b>{{ Session::get('flash_message') }}</b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <span class="section-title__tagline">Mark Your Presence and Stand Out!</span>
            <h2 class="section-title__title">Count Yourself in for {{ $event->event_name }}</h2>
        </div>

        <div class="contact-page__form-box">
            <form action="{{ route('attendance.mark.store', $event->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <div class="contact-form__input-box">
                        <label class="form-label" for="user_type">User Type</label>
                        <select class="form-control" id="user_type" name="user_type" required>
                            <option value="">Select User Type</option>
                            <option value="member">Member</option>
                            <option value="guest">Guest</option>
                        </select>
                    </div>
                </div>
                <div id="member_fields" class="d-none">
                    <div class="mb-3">
                    <div class="contact-form__input-box">
                        <label class="form-label" for="member_id">Member ID</label>
                        <input type="text" class="form-control @error('member_id') is-invalid @enderror" name="member_id" id="member_id">
                        @error('member_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3">
                    <div class="contact-form__input-box">
                        <label class="form-label" for="member_remarks">Remarks</label>
                        <textarea class="form-control @error('member_remarks') is-invalid @enderror" name="member_remarks" id="member_remarks"></textarea>
                        @error('member_remarks')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                </div>
                <div id="guest_fields" class="d-none">
                    <div class="mb-3">
                    <div class="contact-form__input-box">
                        <label class="form-label" for="guest_name">Name</label>
                        <input type="text" class="form-control @error('guest_name') is-invalid @enderror" name="guest_name" id="guest_name">
                        @error('guest_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3">
                    <div class="contact-form__input-box">
                        <label class="form-label" for="guest_phone">Phone Number</label>
                        <input type="text" class="form-control @error('guest_phone') is-invalid @enderror" name="guest_phone" id="guest_phone">
                        @error('guest_phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3">
                    <div class="contact-form__input-box">
                        <label class="form-label" for="guest_email">Email ID</label>
                        <input type="email" class="form-control @error('guest_email') is-invalid @enderror" name="guest_email" id="guest_email">
                        @error('guest_email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3">
                    <div class="contact-form__input-box">
                        <label class="form-label" for="guest_remarks">Remarks</label>
                        <textarea class="form-control @error('guest_remarks') is-invalid @enderror" name="guest_remarks" id="guest_remarks"></textarea>
                        @error('guest_remarks')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        
                        <div class="contact-form__btn-box">
                            <button type="submit" name="submit"class="thm-btn contact-form__btn">I'm In</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
document.getElementById('user_type').addEventListener('change', function() {
    var memberFields = document.getElementById('member_fields');
    var guestFields = document.getElementById('guest_fields');

    if (this.value === 'member') {
        memberFields.classList.remove('d-none');
        guestFields.classList.add('d-none');
    } else if (this.value === 'guest') {
        memberFields.classList.add('d-none');
        guestFields.classList.remove('d-none');
    } else {
        memberFields.classList.add('d-none');
        guestFields.classList.add('d-none');
    }
});
</script>

@endsection
