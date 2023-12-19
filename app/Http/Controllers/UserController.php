<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    //
    public function login(Request $req) {

        if ($req->input('action') === 'regular') {
            // Handle regular user login

            $user = User::where(['email'=>$req->email])->first();

            if (!$user || !Hash::check($req->password,$user->password)) {
                return $user;
            } else {
                $userdata = array(
                    'email' => $req->email ,
                    'password' => $req->password ,
                );
                $req->session()->put('user',$user);
                    if ($user->role_as == "1") {
                        return redirect('/admin')->with('status', 'Welcome to the Dashboard');
                    } else {
                        return redirect('/')->with('status', 'Logged in successfully');
                    }
            }
        } elseif ($req->input('action') === 'test') {
            // Handle test login
            $testUser = User::where(['email'=>"colepole@gmail.com"])->first();

            if (!$testUser) {
                return $testUser;
            } else {
                $req->session()->put('user',$testUser);
                    if ($testUser->role_as == "1") {
                        return redirect('/admin')->with('status', 'Welcome to the Dashboard');
                    } else {
                        return redirect('/')->with('status', 'Logged in successfully');
                    }
            }
            
        }
    }
    public function register(Request $req) {
        $user = new User;
        $user->name=$req->username;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect('/login');
    }

    public function index() {
        return view('frontend.users.profile');
    }

    public function updateUserDetails(Request $request) {
        $request->validate([
            'username' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'zip_code' => ['required', 'digits:5'],
            'address' => ['required', 'string', 'max:499'],
        ]);

        $user = User::findOrFail(Session::get('user')['id']);
        $user->update([
            'name' => $request->username,
        ]);

        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'phone' => $request->phone,
                'zip_code' => $request->zip_code,
                'address' => $request->address,
            ]
        );

        return redirect()->back()->with('message', 'User Profile Updated');
    }

    public function passwordCreate() {
        return view('frontend.users.change-password');
    }

    public function changePassword(Request $request) {
        $request->validate([
            'current_password' => ['required', 'string', 'min:5'],
            'password' => ['required', 'string', 'min:5', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPasswordStatus) {
            User::findOrFail(Session::get('user')['id'])->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back()->with('message', 'Password Updated');
        } else {
            return redirect()->back()->with('message', 'Current Password does not match');
        }
    }
}
