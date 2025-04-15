<?php

namespace App\Http\Controllers;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


use App\Models\User;
class AdminProfileController extends Controller
{
    public function edit()
    {
        $admin = $this->getAuthenticatedAdmin();
        return view("admins.editprofile", compact('admin'));
    }
    
    public function update(Request $request)
    {
        $admin = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $admin->password = bcrypt($request->input('password'));
        }
        $admin->save();
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }
    
private function getAuthenticatedAdmin()
{
    $adminId = Auth::id();
    $admin = Admin::find($adminId);
    return $admin;
}

    
}
