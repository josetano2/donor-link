<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $hospitals = Hospital::all();
        return view('admin.events', compact('events', 'hospitals'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'hospital_id' => 'required|integer|exists:hospitals,id',
            'description' => 'required|string',
            'max_capacity' => 'required|integer|min:1',
            'time_start' => 'required|date_format:H:i',
            'time_end' => 'required|date_format:H:i|after:time_start',
            'contact_number' => 'required|string|max:20',
            'contact_person' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('azure')->putFileAs('events', $image, $filename);
            $imageUrl = rtrim(Storage::disk('azure')->url(''), '/') . '/events/' . $filename;
        }

        Event::create([
            'location' => $request->location,
            'hospital_id' => $request->hospital_id,
            'description' => $request->description,
            'max_capacity' => $request->max_capacity,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'contact_number' => $request->contact_number,
            'contact_person' => $request->contact_person,
            'date' => $request->date,
            'image_url' => $imageUrl,
        ]);
        return redirect()->route('admin')->with(['success' => 'Event has been created!']);
    }

    public function edit(Request $request)
    {
        $request->validate([

            'location' => 'required|string|max:255',
            'hospital_id' => 'required|integer|exists:hospitals,id',
            'description' => 'required|string',
            'max_capacity' => 'required|integer|min:1',
            'time_start' => 'required',
            'time_end' => 'required|after:time_start',
            'contact_number' => 'required|string|max:20',
            'contact_person' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $event = Event::find($request->id);
        $imageUrl = $event->image_url;
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('azure')->putFileAs('events', $image, $filename);
            $imageUrl = rtrim(Storage::disk('azure')->url(''), '/') . '/events/' . $filename;
        }
        $event->update([
            'location' => $request->location,
            'hospital_id' => $request->hospital_id,
            'description' => $request->description,
            'max_capacity' => $request->max_capacity,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'contact_number' => $request->contact_number,
            'contact_person' => $request->contact_person,
            'date' => $request->date,
            'image_url' => $imageUrl,
        ]);
        return redirect()->route('admin')->with(['success' => 'Event has been deleted!']);
    }

    public function delete(Request $request)
    {
        $event = Event::findOrFail($request->id);
        $event->delete();
        return redirect()->route('admin')->with(['success' => 'Event has been deleted!']);
    }

}
