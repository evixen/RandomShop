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

// Маршруты видимой части магазина
Route::group(['namespace' => 'Shop'], function () {

    Route::get('/', 'MainController@index')->name('shop.main');

    Route::get('/{category}', 'MainController@category')
        ->where('category', '^((?!admin|cart$|/).)*$')
        ->name('shop.category');

    Route::get('/{category}/{slug}', 'MainController@product')
        ->where('category', '^((?!admin|cart/).)*$')
        ->name('shop.product');

    // Корзина товаров
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart', 'CartController@store')->name('cart.store');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart.delete');
    Route::put('/cart', 'CartController@clean')->name('cart.clean');

});

// Маршруты админки
Route::group(['namespace' => 'Shop\Admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'MainController@index')->name('shop.admin.main');

    // Категории
    Route::resource('categories', 'CategoryController')
        ->except('show')
        ->names('shop.admin.categories');

    // Товары
    Route::resource('products', 'ProductController')
        ->except(['show'])
        ->names('shop.admin.products');

});

Auth::routes();
