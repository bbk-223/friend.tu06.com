<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    function dashboard() {
        return view('auth.dashboard');
    }
}
