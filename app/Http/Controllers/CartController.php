<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;


class CartController extends Controller
{
    public function cart()
    {
        $carts = Cart::all()->where('user_id', auth()->user()->id);
        $sumQty = Cart::all()
            ->sum('quantity');
        $categories = Category::all();
        return view('/checkout/mycart')->with('carts', $carts)->with('quantity', $sumQty)->with('categories', $categories);
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;

        if($this->checkCartItem($id) == false){
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return redirect("/marketpage/$id")->with('added', 'Product added to cart');
    }

    private function checkCartItem($id){
        $boolean = Cart::where('product_id', $id)->first();
//        dd(count($boolean));
        if($boolean != null){
            $boolean->quantity++;
            $boolean->save();
            return true;
        }
        return false;
    }



    public function removeFromCart($id)
    {
        $carts = Cart::find($id);
        if ($carts != null) {
            $carts->delete();
        }
        return redirect()->back();
    }

    public function updateQty($id, $qty)
    {
        $carts = Cart::find($id);
        if($carts != null){
            $qty = (int)$qty;
            $carts->quantity = $qty;
            $carts->save();
        }
        return redirect()->back();
    }

}
