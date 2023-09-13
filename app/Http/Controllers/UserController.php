<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    function login(Request $req) {
        $user = User::where(['email'=>$req->email])->first();

        if (!$user || !Hash::check($req->password,$user->password)) {
            return $user;
        } else {
            $req->session()->put('user',$user);
            if ($user->role_as == "1") {
                return redirect('/admin')->with('status', 'Welcome to the Dashboard');
            } else {
                return redirect('/')->with('status', 'Logged in successfully');
            }
        }
    }
    function register(Request $req) {
        $user = new User;
        $user->name=$req->username;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect('/login');
    }
}
