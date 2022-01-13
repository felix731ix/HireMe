<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\TransactionDetails;
use App\Models\TransactionHeaders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    //Global Variable

    //getting auth user id
    public function getUserId()
    {
        return auth()->user()->id;
    }

    public function dashboard()
    {
        $balance = User::where('id', '=', $this->getUserId())->first()->balance;
        $transactionHistory = TransactionHeaders::all();
        return view('seller_side.dashboard')
            ->with('balance', $balance)
            ->with('listTransaction', $transactionHistory);
    }

    public function withdraw()
    {
        User::where('id', '=', $this->getUserId())->update(['balance' => 0]);
        return redirect()->route('dashboard')->with('success', 'Your balance has been withdrawn');
    }

    public function managePS()
    {
        return view('seller_side.manageps', [
            'products' => Products::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function addNewItem()
    {
        return view('seller_side.addnewitem', [
            'categories' => Category::all()
        ]);
    }

    public function updateItem(Products $products)
    {
        return view('seller_side.updateitem', [
            'product' => $products,
            'categories' => Category::all()
        ]);
    }

    public function switchToSeller()
    {
        return redirect()->route('dashboard');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric|between:5000,10000000',
            'category_id' => 'required',
            'image' => 'required|image',
        ]);


        if ($request->file('image')) {
            // $validatedData['image'] = $request->file('image')->store('public/product_img_storage');
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/product_img_storage', $file, $imageName);
            $validatedData['image'] = 'product_img_storage/' . $imageName;
        }

        $validatedData['user_id'] = auth()->user()->id;

        Products::create($validatedData);

        return redirect('/manageps')->with('status', 'Products Successfully Added!');
    }

    public function update($id, Request $request)
    {
        $product = Products::where('id', $id)->first();
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric|between:5000,10000000',
            'category_id' => 'required',
            'image' => 'image',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/product_img_storage', $file, $imageName);
            $validatedData['image'] = 'product_img_storage/' . $imageName;
        }

        Products::where('id', $product->id)->update($validatedData);
        return redirect('/manageps')->with('status', 'Product Successfully Updated!');
    }

    public function destroy($id)
    {
        Products::where('id', $id)->delete();
        return redirect('/manageps')->with('status', 'Furniture has been deleted!');
    }
}
