<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $events = Event::where('date', '>=', date('Y-m-d'))->get();

        return view('events', compact('events'));
    }


}
