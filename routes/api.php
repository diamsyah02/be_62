<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// route login
Route::post('/login', 'AuthController@login')->name('auth-login');
// route group
Route::group(['middleware' => ['basic_auth']], function () {
    // route category
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::post('/category', 'CategoryController@store')->name('category-store');
    Route::post('/category/{id}', 'CategoryController@update')->name('category-update');
    Route::get('/category-delete/{id}', 'CategoryController@delete')->name('category-delete');
    // route product
    Route::get('/product', 'ProductController@index')->name('product');
    Route::post('/product', 'ProductController@store')->name('product-store');
    Route::post('/product/{id}', 'ProductController@update')->name('product-update');
    Route::get('/product-delete/{id}', 'ProductController@delete')->name('product-delete');
});
