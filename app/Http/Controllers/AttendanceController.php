<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function show($event_id)
    {
        $event = Event::findOrFail($event_id);
        return view('events.mark', compact('event'));
    }

    public function store(Request $request, $event_id)
    {
        $request->validate([
            'member_id' => 'required|string|max:255',
        ]);

        Attendance::create([
            'event_id' => $event_id,
            'member_id' => $request->member_id,
        ]);

        return redirect()->back()->with(['flash_message' => 'Attendance marked successfully!', 'flash_type' => 'success']);
    }
}

?>