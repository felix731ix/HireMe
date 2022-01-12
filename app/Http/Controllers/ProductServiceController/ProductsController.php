<?php

namespace App\Http\Controllers\ProductServiceController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function show()
    {
        $products = Products::where('user_id', "!=", auth()->user()->id)->get();
        $categories = Category::all();

        return view('marketpage/product_page')->with('products', $products)->with('categories', $categories);
    }

    public function category($id)
    {
        $products =
            Products::where('user_id', "!=", auth()->user()->id)
            ->where('category_id', $id)
            ->get();
        $categories = Category::all();
        return view('marketpage/product_page')->with('products', $products)->with('categories', $categories);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->query('query');
        $categories = Category::all();
        $products = Products::where('name', "LIKE", "%$searchQuery%")
            ->where('user_id', '!=', auth()->user()->id)
            ->paginate()
            ->appends(['q' => $searchQuery]);
        return view('marketpage/product_page')->with('products', $products)->with('categories', $categories);
    }

    public function productDetails($id)
    {
        $products = Products::all()->where('id', $id)->first();
        $categories = Category::all();
        return view('marketpage/details_product_page')->with('products_details', $products)->with('categories', $categories);
    }
}
