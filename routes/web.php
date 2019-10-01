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

Route::get('/home', 'HomeController@index')->name('home');

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
    Route::post('/cart', 'CartController@add')->name('cart.add');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart.delete');
    Route::put('/cart', 'CartController@clean')->name('cart.clean');

});

// Маршруты админки
Route::group(['namespace' => 'Shop\Admin', 'prefix' => 'admin', 'middleware' => 'web'], function () {

    Route::get('/', 'MainController@index')->name('shop.admin.main');

    // Категории
    Route::resource('categories', 'CategoryController')
        ->except('show')
        ->names('shop.admin.categories');
    Route::get('/categories/deleted', 'CategoryController@deleted')
        ->name('shop.admin.categories.deleted');
    Route::get('/categories/{id}/restore', 'CategoryController@restore')
        ->name('shop.admin.categories.restore');

    // Товары
    Route::resource('products', 'ProductController')
        ->except(['show'])
        ->names('shop.admin.products');
    Route::get('/products/deleted', 'ProductController@deleted')
        ->name('shop.admin.products.deleted');
    Route::get('/products/{id}/restore', 'ProductController@restore')
        ->name('shop.admin.products.restore');

});
