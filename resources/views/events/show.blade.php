@extends('layouts.app')

@section('meta_title', 'Events')

@section('content')
<section class="contact-three">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="comment-form">
                    <h3 class="comment-form__title">Join The Event</h3>
                    <form action="{{ route('events.join', $data->id) }}" method="POST" class="comment-one__form contact-form-validated">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-form__input-box">
                                    <select id="participant_type" name="participant_type" required>
                                        <option value="">Select Participant Type</option>
                                        <option value="member">Member</option>
                                        <option value="guest">Guest</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Member Section -->
                        <div id="member_section" style="display:none;">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact-form__input-box">
                                        <input type="text" placeholder="Your Member ID" name="member_id">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-form__input-box">
                                        <select name="food_preference" required>
                                            <option value="">Select Food Preference</option>
                                            <option value="veg">Veg</option>
                                            <option value="nonveg">Non-Veg</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-form__input-box">
                                        <textarea placeholder="Remarks" name="remarks_member"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Guest Section -->
                        <div id="guest_section" style="display:none;">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact-form__input-box">
                                        <input type="text" placeholder="Your Name" name="guest_name" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-form__input-box">
                                        <input type="text" placeholder="Organization" name="guest_organization" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-form__input-box">
                                        <input type="text" placeholder="Phone Number" name="guest_phone" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-form__input-box">
                                        <input type="email" placeholder="Email ID" name="guest_email" required>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-form__input-box">
                                        <select name="food_preference" required>
                                            <option value="">Select Food Preference</option>
                                            <option value="veg">Veg</option>
                                            <option value="nonveg">Non-Veg</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-form__input-box">
                                        <textarea placeholder="Remarks" name="remarks_guest"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="comment-form__btn-box">
                                    <button type="submit" class="thm-btn comment-form__btn">Join</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Event Details -->
                <div class="donation-details__left">
                    <div class="donation-details__top">
                        <div class="donation-details__content">
                            <h3 class="donation-details__title">{{ $data->event_name }}</h3>
                            <p class="donation-details__text">{{ $data->about_event }}</p>
                        </div>
                        <div class="event-header">
                            <p id="event-date"><b>Date:</b> {{ $data->date }}</p>
                            <p id="event-location"><b>Location:</b> {{ $data->location_event }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var participantTypeSelect = document.getElementById('participant_type');
    var memberSection = document.getElementById('member_section');
    var guestSection = document.getElementById('guest_section');

    participantTypeSelect.addEventListener('change', function() {
        memberSection.style.display = this.value === 'member' ? 'block' : 'none';
        guestSection.style.display = this.value === 'guest' ? 'block' : 'none';
    });
});
</script>
@endsection
