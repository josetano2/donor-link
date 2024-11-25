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
        $hospitals = Hospital::all();
        return view('admin', compact('hospitals'));
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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('azure')->putFileAs('events', $image, $filename);
        }
        $imageUrl = rtrim(Storage::disk('azure')->url(''), '/') . '/events/' . $filename;
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
        return redirect()->route('home')->with(['success' => 'Event has been created!']);
    }
}
