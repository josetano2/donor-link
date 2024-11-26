<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEventController extends Controller
{
    //
    public function register(Request $req)
    {
        $req->validate([
            'event_id' => 'required|integer|exists:events,id',
        ]);
        $user = Auth::user();
        if ($user->events()->where('event_id', $req->event_id)->exists()) {
            return back()->with('error', 'You have already registered for this event.');
        }
        $user->events()->attach($req->event_id);
        return back()->with('success', 'You have successfully registered for the event!');
    }
}
