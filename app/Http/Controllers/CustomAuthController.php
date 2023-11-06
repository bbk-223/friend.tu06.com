<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    function dashboard() {
        return view('auth.dashboard');
    }
    function editProfile(Request $request) {
        return view('auth.edit-profile', [
            'user' => $request->user()
        ]);
    }
    function changePassword() {
        return view('auth.password.change-password');
    }
}
