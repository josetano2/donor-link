<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        return view('admin', compact('hospitals'));
    }
}
