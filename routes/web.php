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

Auth::routes();

Route::get('/', 'ProductsController@index')->name('products.index');


Route::get('/wishlist', 'WishListController@index')->name('wishlist.index');
Route::post('/wishlist', 'WishListController@store')->name('wishlist.store')->middleware('auth');
Route::get('/wishlist/{id}', 'WishListController@show')->name('wishlist.show');
