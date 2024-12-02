<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserEventController extends Controller
{
    public function isRegistered($userId, $eventId){
        $isExist = DB::table('user_events')->where('user_id', $userId)->where('event_id', $eventId)->exists();

        return $isExist;
    }

    public function tracker()
    {
        $userId = Auth::id();
        $upcomingEvents = UserEvent::where('user_id', $userId)
            ->whereHas('events', function ($query) {
                $query->where('date', '>=', date('Y-m-d'));
            })
            ->with('events')
            ->get();
        $previousEvents = UserEvent::where('user_id', $userId)
            ->whereHas('events', function ($query) {
                $query->where('date', '<', date('Y-m-d'));
            })
            ->with('events')
            ->get();

        return view('tracker', compact('upcomingEvents', 'previousEvents'));
    }

    public function index($id)
    {
        $event = Event::find($id);
        $isRegistered = $this->isRegistered(Auth::id(), $id);

        return view('event_detail', compact('event', 'isRegistered'));
    }


    public function register(Request $req)
    {
        $req->validate([
            'event_id' => 'required|integer|exists:events,id',
        ]);

        $userId = Auth::id();
        $eventId = $req->input('event_id');

        if($this->isRegistered($userId, $eventId)){
            return redirect('/events')->with('error', 'You have registered to this event');
        }

        UserEvent::create([
            'user_id' => $userId,
            'event_id' => $eventId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);



        return redirect('/events')->with('success', 'You have successfully registered for the event!');
    }
}
