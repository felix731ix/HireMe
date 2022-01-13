<?php

namespace App\Http\Controllers\ProductServiceController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

    public function show()
    {
        if(Auth::check()){
            $products = Products::where('user_id', "!=", auth()->user()->id)->get();
        }
        else{
            $products = Products::all();
        }

        $categories = Category::all();

        return view('marketpage/product_page')->with('products', $products)->with('categories', $categories);
    }

    public function category($id)
    {
        if(Auth::check()){
            $products =
                Products::where('user_id', "!=", auth()->user()->id)
                    ->where('category_id', $id)
                    ->get();
        }
        else{
            $products =
                Products::where('category_id', $id)->get();
        }

        $categories = Category::all();
        return view('marketpage/product_page')->with('products', $products)->with('categories', $categories);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->query('query');
        $categories = Category::all();

        if (Auth::check()) {
            $products = Products::where('name', "LIKE", "%$searchQuery%")
                ->where('user_id', '!=', auth()->user()->id)
                ->paginate()
                ->appends(['q' => $searchQuery]);
        } else {
            $products = Products::where('name', "LIKE", "%$searchQuery%")
                ->paginate()
                ->appends(['q' => $searchQuery]);
        }

        return view('marketpage/product_page')->with('products', $products)->with('categories', $categories);
    }

    public function productDetails($id)
    {
        $products = Products::all()->where('id', $id)->first();
        $categories = Category::all();
        return view('marketpage/details_product_page')->with('products_details', $products)->with('categories', $categories);
    }
}
