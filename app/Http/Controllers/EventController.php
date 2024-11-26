<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $events = Event::all();
        return view('events', compact('events'));
    }

    public function getEvent($id)
    {
        $event = Event::find($id);
        return view('event_detail', compact('event'));
    }   
    
}
