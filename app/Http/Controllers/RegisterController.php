<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $blood_types = BloodType::all();

        return view('register', compact('blood_types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'dob' => 'required|date',
            'blood_type' => 'required',
            'gender' => 'required|in:Male,Female',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'dob' => $validated['dob'],
            'blood_type_id' => $validated['blood_type'],
            'gender' => $validated['gender'],
        ]);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }
}
