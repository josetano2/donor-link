<?php

namespace App\Http\Controllers;

use App\Models\BloodType;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $blood_types = BloodType::all();

        return view('register', compact('blood_types'));
    }
}
