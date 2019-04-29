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
//route for the route controller.
Route::resource('/cart', 'CartController');

Route::post('/cart/{id}/delete', 'CartController@destroy')->name('cart.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//this fixes logout issues.
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
//this adds the resource routes to the command prompt
Route::resource('/orders', 'OrdersController');
