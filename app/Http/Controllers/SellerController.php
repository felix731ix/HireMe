<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TransactionDetails;
use App\Models\TransactionHeaders;
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
            $balance = User::where('id', '=', $this->getUserId())->first()->balance;
            $transactionHistory = TransactionHeaders::all();
            return view('seller_side.dashboard')
                ->with('balance', $balance)
                ->with('listTransaction', $transactionHistory);
    }

    public function withdraw(){
        User::where('id', '=', $this->getUserId())->update(['balance' => 0]);
        return redirect()->route('dashboard')->with('success', 'Your balance has been withdrawn');
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
        return redirect()->route('dashboard');
    }
}
