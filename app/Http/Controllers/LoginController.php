<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index() {
        if(Auth::check()) {
            return redirect()->route('nhanvien.index');
        }
        return view('login.login');
    }

    public function postLogin(Request $request) {
        $data = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $errorMessage = 'Username or Password is invalid!!!';
        $foundAcc = Account::where('username', $request->username)
                    ->where('password', $request->password)
                    ->first();
        if($foundAcc) {
            if($foundAcc->role == 1) {
                Auth::login($foundAcc);
                return response()->json(['data'=> 1]);
            }
            else {
                Auth::login($foundAcc);
                return response()->json(['data'=> 0]);
            }
        }
        // if (Auth::attempt($data)) {
        //     if(Auth::user()->role() == 1)
        //         return response()->json(['data'=> 1]);
        //     else
        //         return response()->json(['data'=> 0]);
        // }
        // else return response()->json(['status'=> $errorMessage, 'data'=>Auth::user()->role()]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }
}
