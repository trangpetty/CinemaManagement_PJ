<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;


class LoginController extends Controller
{
    public function index() {
        return view('login.login');
    }

    public function postLogin(Request $request) {
        $errorMessage = '<i class="fa-solid fa-circle-exclamation"></i> Username or Password is invalid!!!';
        $foundAcc = User::where('username', $request->username)
                    ->where('password', $request->password)
                    ->first();
        if($foundAcc){
            if($foundAcc->role == 1) {
                Auth::login($foundAcc);
                $request->session()->put('user_id', 1);
                return response()->json(['data'=> 1]);
            }
            else if ($foundAcc->role == 0){
                Auth::login($foundAcc);
                $request->session()->put('user_id', 0);
                return response()->json(['data'=> 0]);
            }
        }
        return response()->json(['status'=> $errorMessage]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function store(Request $request) {
        $user = User::create([
            'username' => request('username'),
            'password' => request('password'),
            'email' => request('email')
        ]);
        return response()->json(
            ['status'=> 'success',
             'data' => $user
            ]
        );
    }
}
