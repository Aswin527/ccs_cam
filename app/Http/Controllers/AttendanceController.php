<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Event;
use App\Models\Country;

class AttendanceController extends Controller
{

    public function show($event_id)
    {
        $event = Event::findOrFail($event_id);
        $country = Country::get();
        return view('events.mark', compact('event'))->with('country',$country);
    }
    public function store(Request $request, $eventId)
    {
        // Validate request data
        $validatedData = $request->validate([
            'user_type' => 'required|in:member,guest',
            // Add validation rules for other fields based on user type
        ]);

        // Create attendance record
        $attendance = new Attendance();
        $attendance->event_id = $eventId;
        $attendance->user_type = $validatedData['user_type'];

        // Set fields based on user type
        if ($validatedData['user_type'] == 'member') {
            $attendance->member_id = $request->input('member_id');
            $attendance->remarks = $request->input('member_remarks');
        } elseif ($validatedData['user_type'] == 'guest') {
            $attendance->guest_name = $request->input('guest_name');
            $attendance->guest_phone = $request->input('guest_phone');
            $attendance->guest_email = $request->input('guest_email');
            $attendance->remarks = $request->input('guest_remarks');
        }

        // Save attendance record
        $attendance->save();

        // Redirect back with success message
        return redirect()->back()->with('flash_message', 'Thank You Participating!');
    }
}
