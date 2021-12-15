<?php

namespace App\Http\Controllers\UserAuthentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class UserLoginController extends Controller
{
    public function login(){
        return view('/auth_user/user_login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email'=> 'required|email:dns',
            'password'=> 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/marketpage')->with('success');
        }

        return back()->with('loginError', 'Invalid credentials, make sure the information provided are correct');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
