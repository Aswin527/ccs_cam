<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EventController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'event_name' => 'required|string|max:255',
            'location_event' => 'required|string|max:255',
            'date' => 'required|date',
            'image_event' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'iframe' => 'nullable|string',
            'about_event' => 'nullable|string',
        ]);

        // Handle the image upload
        if ($request->hasFile('image_event')) {
            $imagePath = $request->file('image_event')->store('event_images', 'public');
        }

        // Create the event
        $event = Event::create([
            'event_name' => $request->event_name,
            'location_event' => $request->location_event,
            'date' => $request->date,
            'image_event' => $imagePath ?? null,
            'iframe' => $request->iframe,
            'about_event' => $request->about_event,
        ]);

        // Generate the URL for marking attendance
        $attendanceUrl = route('attendance.mark', ['event_id' => $event->id]);

        // Generate the QR code and save it as an image
        $qrCodePath = 'qr_codes/' . $event->id . '.png';
        QrCode::format('png')->size(200)->generate($attendanceUrl, public_path($qrCodePath));

        // Update the event with the QR code path
        $event->update(['qr_code' => $qrCodePath]);

        // Redirect with a success message
        return redirect()->back()->with(['flash_message' => 'Event created successfully!', 'flash_type' => 'success']);
    }
}

?>