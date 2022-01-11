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
            // $transactionHistory = TransactionHeaders::all()[10]->transactionDetails;
            // $transactionDetails = TransactionDetails::where('seller_id', '=', $this->getUserId())->get();
            $transactionHistory = DB::table('transaction_headers')
                                    ->join('transaction_details', 'transaction_headers.id', 'transaction_details.transaction_id')
                                    ->join('products', 'transaction_details.product_id', 'products.id')
                                    ->where('transaction_details.seller_id', '=', $this->getUserId())->get();
            // dd($transactionHistory);
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
