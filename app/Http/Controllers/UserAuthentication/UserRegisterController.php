<?php

namespace App\Http\Controllers\UserAuthentication;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{

    public function register(){
        return view("/auth_user/user_registration");
    }

    public function store(Request $request){

        $rules = [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users',
            'password'=> 'required|min:5|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_picture = 'profile_img_storage/default_picture.jpg';
        $user->save();


//        $validatedData = $request->validate([
//            'name' => 'required',
//            'email' => 'required|email|unique:users',
//            'password'=> 'required|min:5|max:255'
//        ]);
//
//        $validatedData['password'] = Hash::make($validatedData['password']);
//        User::create($validatedData);

        return redirect('/user-login')->with('success','Registration successfull! Please login');
    }


}
