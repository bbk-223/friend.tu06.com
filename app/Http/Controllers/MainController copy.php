<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function main() {
        $users = User::orderBy('id','DESC')->paginate(12);
        $js_users = User::where('profile_picture', '!=', 'NULL')->where('profile_picture','!=','test')->take(16);
        return view('home',[
            'users'=>$users,
            'js_users'=>$js_users
        ]);
    }

    function search() {
        $now = strtotime(now());
        $age1 = date('Y',$now) - request()->age1;
        $result_birth1 = Carbon::createFromFormat('Y-m-d', $age1.'-01-01')->toDateString();
        $age2 = date('Y',$now) - request()->age2;
        $result_birth2 = Carbon::createFromFormat('Y-m-d', $age2.'-01-01')->toDateString();


        if(request()->city != ''){
            $users = User::orderBy('id','DESC')->where('gender', request()->gender)->whereDate('birth', '>', $result_birth2)->whereDate('birth', '<', $result_birth1)->where('city', '=', request()->city)->paginate(12);
        }elseif(!isset(request()->age1)){
            $users = User::orderBy('id','DESC')->paginate(12);
        }else{
            $users = User::orderBy('id','DESC')->where('gender', request()->gender)->whereDate('birth', '>', $result_birth2)->whereDate('birth', '<', $result_birth1)->paginate(12);
        }
        return view('searching', [
            'users'=>$users,
        ]
    );
    }

    function profile($id){
        $user = User::findOrFail($id);
        $users = User::orderBy('id','DESC')->paginate(12);


        return view('profile', ['users' => $users, 'user' => $user]);
    }
}
