<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TransactionDetails;
use App\Models\TransactionHeaders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(){
        $data = User::where('id',auth()->user()->id)->first()->get();
        $categories = Category::all();
        $transactionHistory = TransactionHeaders::where('user_id', auth()->user()->id)->get();

        return view('profile/profile')
            ->with('data', $data)
            ->with('failed', 0)
            ->with('categories', $categories)
            ->with('listTransaction', $transactionHistory);
    }

    public function updateProfile(Request $request){
        $user = User::find(auth()->user()->id);
        if($request->password != null){
            $rules = [
                'name' => 'required|regex:/^[\pL\s]+$/u',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore(auth()->user()->id)
                ],
                'password'=> 'required|min:5|max:255',
            ];
            $validator = Validator::make($request->all(), $rules);
            $user->password = Hash::make($request->password);
        }

        else{
            $rules = [
                'name' => 'required|regex:/^[\pL\s]+$/u',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')->ignore(auth()->user()->id)
                ],
            ];
            $validator = Validator::make($request->all(), $rules);
        }

        if($validator->fails()){
            return back()->withInput()->with('failed', 1)->withErrors($validator);
        }

        $file = $request->file('profile_picture');

        if($file!=null){
            $imageName = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/profile_img_storage', $file, $imageName);
            if(!Str::contains($user->profile_picture, ['default_picture.jpg'])){
                Storage::delete('public/'.$user->profile_picture);
            }
            $user->profile_picture = 'profile_img_storage/'.$imageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back();
    }
}
