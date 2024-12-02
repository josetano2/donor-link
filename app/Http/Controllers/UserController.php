<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{

    public function index()
    {
        return view('profile');
    }

    public function upload(Request $req){
        $req->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($req->hasFile('photo')) {
            $image = $req->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            Storage::disk('azure')->putFileAs('folder', $image, $filename);
            $profileUrl = rtrim(Storage::disk('azure')->url(''),'/').'/folder/'.$filename;

            $user = Auth::user();
            $user->profile_url = $profileUrl;
            $user->save();

            return back()->with('success', 'Image uploaded successfully!');
        } else {

            return back()->with('error', 'Please select an image to upload.');
        }
    }

}
