<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route
Route::get('/', function (){
    return view('index');
});

Route::get('category/{id}', [\App\Http\Controllers\ProductServiceController\ProductsController::class, 'category']);

/*User Account Authentication*/
Route::get('/user-login', [\App\Http\Controllers\UserAuthentication\UserLoginController::class, 'login'])->middleware('guest');
Route::get('/user-register', [\App\Http\Controllers\UserAuthentication\UserRegisterController::class, 'register']);
Route::post('/user-register', [\App\Http\Controllers\UserAuthentication\UserRegisterController::class, 'store']);
Route::post('/user-login', [\App\Http\Controllers\UserAuthentication\UserLoginController::class, 'authenticate']);
Route::post('logout', [\App\Http\Controllers\UserAuthentication\UserLoginController::class, 'logout']);

/*Marketpage*/
Route::get('/marketpage', [\App\Http\Controllers\ProductServiceController\ProductsController::class , 'show']);
Route::get('/marketpage/search-item', [\App\Http\Controllers\ProductServiceController\ProductsController::class, 'search']);
Route::get('/marketpage/{id}',[\App\Http\Controllers\ProductServiceController\ProductsController::class, 'productDetails']);

/*Cart*/
Route::get('/cart',[App\Http\Controllers\CartController::class, 'cart']);
Route::put('/updateProduct', [\App\Http\Controllers\CartController::class, 'updateQty']);
Route::post('/item',[\App\Http\Controllers\CartController::class, 'addToCart']);
Route::delete('/remove/{id}',[\App\Http\Controllers\CartController::class, 'removeFromCart']);

/*Checkout From Cart, Checkout from Buy Now*/
Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'checkOutViaCart']);
Route::post('/checkout-now', [\App\Http\Controllers\CheckoutController::class, 'checkoutPaymentOrderNow']);
Route::get('/checkout-now', [\App\Http\Controllers\CheckoutController::class, 'checkoutPaymentOrderNow']);
Route::get('/order-now/{id}', [\App\Http\Controllers\CheckoutController::class, 'checkOutViaOrderNow']);

/*Payment*/
Route::post('/validate-payment',[\App\Http\Controllers\CheckoutController::class, 'checkPayment']);
Route::post('/success',[\App\Http\Controllers\CheckoutController::class, 'paymentController']);

/*Profile*/
Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show']);
Route::post('/update-profile', [\App\Http\Controllers\ProfileController::class, 'updateProfile']);

/*Export Data*/
Route::post('/export', [\App\Http\Controllers\TransactionHistoryController::class, 'transactionHistoryExport']);
