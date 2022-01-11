<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    //Global Variable

    //getting auth user id
    public function getUserId(){
        return auth()->user()->id;
    }

    public function dashboard(){
            // $user_id = auth()->user()->id;
            $balance = User::where('id', '=', $this->getUserId())->first()->balance;
            // dd($balance);
            return view('seller_side.dashboard')
                ->with('balance', $balance);
    }

    public function managePS(){
        return view('seller_side.manageps');
    }

    public function addNewItem(){
        return view('seller_side.addnewitem');
    }

    public function updateItem(){
        return view('seller_side.updateitem');
    }

    public function switchToSeller(){
        DB::table('users')->where('id', '=', auth()->user()->id)->update(['role' => 'seller']);
        return redirect()->route('dashboard');
    }
}
