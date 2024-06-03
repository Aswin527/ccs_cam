<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendance;

class EventController extends Controller
{
    public function showAttendanceForm(Event $event)
    {
        return view('events.attendance', compact('event'));
    }

    public function markAttendance(Request $request, Event $event)
    {
        $request->validate([
            'member_id' => 'required|exists:members,id',
        ]);

        Attendance::create([
            'event_id' => $event->id,
            'member_id' => $request->member_id,
        ]);

        return redirect()->back()->with('success', 'Attendance marked successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'location_event' => 'required|string|max:255',
            'date' => 'required|date',
            'image_event' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'iframe' => 'nullable|string',
            'about_event' => 'nullable|string',
        ]);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->location_event = $request->location_event;
        $event->date = $request->date;
        $event->iframe = $request->iframe;
        $event->about_event = $request->about_event;

        if ($request->hasFile('image_event')) {
            $imageName = time().'.'.$request->image_event->extension();
            $request->image_event->move(public_path('images'), $imageName);
            $event->image_event = $imageName;
        }

        $event->save();

        return redirect()->route('admin.event-create')->with(['flash_message' => 'Event created successfully!', 'flash_type' => 'success', 'event' => $event]);
    }

}

?>