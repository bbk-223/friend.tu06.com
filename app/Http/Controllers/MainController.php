<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function main() {
        $users = User::paginate(12);
        return view('home', compact('users'));
    }

    function search() {
        if(request()->city != ''){
            $users = User::where('gender', request()->gender)->where('age', '>', request()->age1)->where('age', '<', request()->age2)->where('city', '=', request()->city)->paginate(12);
        }else{
            $users = User::where('gender', request()->gender)->where('age', '>', request()->age1)->where('age', '<', request()->age2)->paginate(12);
        }
        return view('searching', compact('users'));
    }
}
