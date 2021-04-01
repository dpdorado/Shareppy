<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('users', UserController::class);//->middleware('auth');
Route::resource('products', ProductController::class);
Route::resource('products_list', ProductListController::class);
Route::resource('carts', CartController::class);


/*Route::post('/cart-add',    'CartController@add')->name('cart.add');
Route::get('/cart-checkout','CartController@cart')->name('cart.checkout');
Route::post('/cart-clear',  'CartController@clear')->name('cart.clear');
Route::post('/cart-removeitem',  'CartController@removeitem')->name('cart.removeitem');*/

/*Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('users', UserController::class);//->middleware('auth');
    Route::resource('products', ProductController::class);
});

Route::group(['middleware' => 'user'], function () {    
    Route::resource('products_list', ProductListController::class);
});

Route::group(['middleware' => 'operative'], function () {
});*/