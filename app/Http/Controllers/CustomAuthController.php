<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    function dashboard() {
        return view('auth.dashboard',[ 'conversations' => auth()->user()->conversations()->latest('updated_at')->get()]);
    }
    function editProfile(Request $request) {
        return view('auth.edit-profile', [
            'user' => $request->user(),
            'conversations' => auth()->user()->conversations()->latest('updated_at')->get()
        ]);
    }
    function changePassword() {
        return view('auth.password.change-password',['conversations' => auth()->user()->conversations()->latest('updated_at')->get()]);
    }
}
