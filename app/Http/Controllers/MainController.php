<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function main() {
        $users = User::paginate(12);
        return view('home',[
            'users'=>$users,
            'conversations'=>auth()->user()->conversations()->latest('updated_at')->get(),
        ]);
    }

    function search() {
        if(request()->city != ''){
            $users = User::where('gender', request()->gender)->where('age', '>', request()->age1)->where('age', '<', request()->age2)->where('city', '=', request()->city)->paginate(12);
        }else{
            $users = User::where('gender', request()->gender)->where('age', '>', request()->age1)->where('age', '<', request()->age2)->paginate(12);
        }
        return view('searching', [
            'users'=>$users,
            'conversations'=>auth()->user()->conversations()->latest('updated_at')->get(),
        ]
    );
    }

    function profile($id){
        $user = User::findOrFail($id);
        $users = User::paginate(12);
        return view('profile', ['users' => $users, 'user' => $user, 'conversations' => auth()->user()->conversations()->latest('updated_at')->get()]);
    }
}
