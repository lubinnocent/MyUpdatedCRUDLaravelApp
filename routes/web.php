<?php

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
    return view('home');
});

Route::get('/add_product', function () {
    return view('products.add_product');
});

Route::post('/add','ProductsController@store');

Route::get('/show_products','ProductsController@showProducts');

Auth::routes();

Route::resource('/edit','ProductsController');

Route::post('/edit_product','ProductsController@updateProduct');

Route::post('/delete_product','ProductsController@deleteProduct');
