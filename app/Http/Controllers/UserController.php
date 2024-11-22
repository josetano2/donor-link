<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //
    public function upload(Request $req){
        $req->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if($req->hasFile('photo')) {
            $image = $req->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
    
            Storage::disk('azure')->putFileAs('folder', $image, $filename);

            return back()->with('success', 'Image uploaded successfully!');
        } else {
            
            return back()->with('error', 'Please select an image to upload.');
        }
    }
    
}