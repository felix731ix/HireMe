<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardVerificationRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use App\Models\TransactionDetails;
use App\Models\TransactionHeaders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;


class CheckoutController extends Controller
{

    public function checkOutViaCart(Request $request)
    {
        $data = Cart::where('user_id', auth()->user()->id)->get();
        $categories = Category::all();
        return view('payment/payment_cart')->with('data', $data)->with('categories', $categories);
    }

    public function checkOutViaOrderNow($id)
    {
        $data = Products::where('id', $id)->get();
        $categories = Category::all();
        return view('checkout/ordernow')->with('data', $data)->with('categories', $categories);
    }

    public function checkoutPaymentOrderNow(Request $request){

        $categories = Category::all();

        if(($request->session()->get('data') && $request->session()->get('price') && $request->session()->get('quantity'))!= null ){
            $data = session()->get('data');
            $price = session()->get('price');
            $quantity = session()->get('quantity');
        }
        else{
            $data = $request->id;
            $price = $request->total_price;
            $quantity = $request->product_quantity;
        }

        return view('payment/payment_ordernow')
            ->with('data', $data)
            ->with('sumTotal', $price)
            ->with('quantity', $quantity)
            ->with('categories', $categories);
    }


    public function paymentController(Request $request){

        $categories = Category::all();

        $cardNumber = $request->card_number;

        $rules=[
          'card_number'=>'required|min:18',
          'expiration_month'=>'required',
          'expiration_year'=>'required',
            'card_cvv'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()
                ->back()
                ->with('failed', 0)
                ->with('data', $request->id)
                ->with('price', $request->total_price)
                ->with('quantity', $request->product_quantity)
                ->with('categories', $categories);
        }


        $transactionHeadersID = TransactionHeaders::create([
            'user_id' => auth()->user()->id,
            'card_number'=>$cardNumber
        ]);

        /*Request from buynow*/
        if(($request->id  && $request->product_quantity && $request->total_price) != null){
            $productID = $request->id;
            $productQuantity = $request->product_quantity;
            $seller_id = Products::where('id','=',$productID)->first()->user_id;
            // dd($seller_id);
            TransactionDetails::create([
                'transaction_id' => $transactionHeadersID->id,
                'seller_id' => $seller_id,
                'product_id'=> $productID,
                'quantity' => $productQuantity,
            ]);
        }

        /*Request from cart*/
        else{
            $cartsData = Cart::where('user_id', auth()->user()->id)->get();
            for($i=0;$i<count($cartsData);$i++){
                $seller_id = Products::where('id','=',$cartsData[$i]->products->id)->first()->user_id;
                TransactionDetails::create([
                    'transaction_id' => $transactionHeadersID->id,
                    'seller_id' => $seller_id,
                    'product_id'=> $cartsData[$i]->products->id,
                    'quantity' => $cartsData[$i]->quantity,
                ]);
            }

            Cart::where('user_id', auth()->user()->id)->delete();
        }


        return view('page_status/success_transaction')->with('categories', $categories);
        sleep(3);
        return redirect('/marketpage');
    }

}
