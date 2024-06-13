<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Participant;

class EventController extends Controller
{
    public function __construct()
    {
        // Apply authentication middleware to the join method
        $this->middleware('auth')->only(['join']);
    }

    public function show($id)
    {
        $data = Event::findOrFail($id);
        return view('events.show', compact('data'));
    }

    public function join(Request $request, $id)
    {
        $request->validate([
            'participant_type' => 'required|string',
            'member_id' => 'required_if:participant_type,member|string|nullable',
            'guest_name' => 'required_if:participant_type,guest|string|nullable',
            'guest_organization' => 'required_if:participant_type,guest|string|nullable',
            'guest_phone' => 'required_if:participant_type,guest|string|nullable',
            'guest_email' => 'required_if:participant_type,guest|email|nullable',
            'food_preference' => 'required|string',
            'remarks_member' => 'string|nullable',
            'remarks_guest' => 'string|nullable',
        ]);

        $participant = new Participant([
            'event_id' => $id,
            'participant_type' => $request->participant_type,
            'member_id' => $request->participant_type == 'member' ? $request->member_id : null,
            'guest_name' => $request->participant_type == 'guest' ? $request->guest_name : null,
            'guest_organization' => $request->participant_type == 'guest' ? $request->guest_organization : null,
            'guest_phone' => $request->participant_type == 'guest' ? $request->guest_phone : null,
            'guest_email' => $request->participant_type == 'guest' ? $request->guest_email : null,
            'food_preference' => $request->food_preference,
            'remarks' => $request->participant_type == 'member' ? $request->remarks_member : $request->remarks_guest,
        ]);

        $participant->save();

        return redirect()->route('events.show', $id)->with('success', 'You have successfully joined the event.');
    }
}
?>