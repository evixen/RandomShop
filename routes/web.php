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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['namespace' => 'Shop'], function () {

    // Маршруты корзины товаров
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart.delete');
    Route::put('/cart', 'CartController@clean')->name('cart.clean');

    Route::get('/', 'MainController@index')->name('shop.main');
    Route::get('/{category}', 'MainController@category')->name('shop.category');
    Route::get('/{category}/{slug}', 'MainController@product')->name('shop.product');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
