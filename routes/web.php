<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('products', 'ProductsController@index')->name('products');
Route::get('products/{product}', 'ProductsController@show')->name('products.show');

Route::get('categories', 'CategoriesController@index')->name('categories');
Route::get('categories/{category}', 'CategoriesController@show')->name('categories.show');

Route::delete('ajax/productImage/{image_id}', 'ProductImageController@destroy')->name('ajax.products.images.delete');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', 'BoardController')->name('home');

    Route::name('orders')->group(function () {
        Route::get('orders', 'OrdersController@index');
        Route::get('orders/{orders}/edit', 'OrdersController@edit')->name('.edit');
    });

    Route::name('products')->group(function () {
        Route::get('products', 'ProductsController@index');
        Route::get('products/{product}/edit', 'ProductsController@edit')->name('.edit');
        Route::put('products/{product}/update', 'ProductsController@update')->name('.update');
        Route::delete('products/{product}', 'ProductsController@destroy')->name('.delete');
        Route::get('products/new', 'ProductsController@create')->name('.create');
        Route::post('products', 'ProductsController@store')->name('.store');
    });
});



Route::namespace('Account')->prefix('account')->name('account.')->middleware(['auth'])->group(function () {
});

Route::middleware('auth')->group(function() {

    Route::get('cart', 'CartController@index')->name('cart');
    Route::post('cart/{product}/add', 'CartController@add')->name('cart.add');
    Route::post('cart/{product}/delete', 'CartController@delete')->name('cart.delete');
    Route::post('cart/{product}/count/update', 'CartController@countUpdate')->name('cart/count.update');

    // Route::get('checkout', 'CheckoutController')->name('checkout');


});