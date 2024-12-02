<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\Hospital;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        $bloodTypes = BloodType::all();
        $userId = Auth::id();

        $donorRequests = Request::where('user_id', '=', $userId)->get();
        return view('request', compact('hospitals', 'bloodTypes', 'donorRequests'));
    }
}
