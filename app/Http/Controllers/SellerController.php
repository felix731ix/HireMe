<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    //
    public function dashboard(){
        if(auth()->guest() || auth()->user()->role == 'buyer'){
            return redirect()->back();
        }else{
            return view('seller_side.dashboard');
        }
    }

    public function switchToSeller(){
        DB::table('users')->where('id', '=', auth()->user()->id)->update(['role' => 'seller']);
        return redirect()->route('dashboard');
    }
}
