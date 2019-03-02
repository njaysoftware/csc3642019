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

//route for supplier information
Route::resource('/suppliers', 'SupplierController');
//route for products information
Route::resource('/products', 'ProductController');
Route::get('/', 'ProductController@index');
