<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\Hospital;
use App\Models\Request as RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        $bloodTypes = BloodType::all();
        $userId = Auth::id();

        $donorRequests = RequestModel::where('user_id', '=', $userId)->paginate(3);
        return view('request', compact('hospitals', 'bloodTypes', 'donorRequests'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'hospital' => 'required',
            'blood_type' => 'required',
            'reason' => 'required|string|max:1000'
        ]);


        $data = RequestModel::create([
            'user_id' => Auth::id(),
            'hospital_id' => $validated['hospital'],
            'blood_type_id' => $validated['blood_type'],
            'reason' => $validated['reason'],
            'status' => 'Pending',
            'request_date' => date('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        dd($data);
        return redirect()->route('request')->with('success', 'Request Submitted');


    }
}
