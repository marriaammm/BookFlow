<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use App\Models\User;
class ProfileController extends Controller
{
    public function edit()
{
    $user = Auth::user();
    return view("profile", compact('user'));
}

public function update(Request $request)
{
    $user = Auth::user();
    $user->name = $request->name;
    $user->email = $request->email;
    
    // Only update the password if it's not empty
    if (!empty($request->password)) {
        $user->password = bcrypt($request->password);
    }
    
    $user->save();
    
    Session::flash('success', 'Profile updated successfully');
    return redirect()->back();}

    
}
