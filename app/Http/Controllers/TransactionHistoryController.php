<?php

namespace App\Http\Controllers;
use App\Exports\TransactionHistoryExport;
use App\Exports\TransactionHistorySellerExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class TransactionHistoryController extends Controller
{
    public function transactionHistoryExport(Request $request){

        $transactionHistory = new TransactionHistoryExport;
        $transactionHistory->setId($request->id);
        return Excel::download($transactionHistory, time().'.xlsx');
    }

    public function exportSeller(Request $request){
        $transactionHistory = new TransactionHistorySellerExport;
        $transactionHistory->setId($request->id);
        return Excel::download($transactionHistory, time().'.xlsx');
    }
}
