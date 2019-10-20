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

Auth::routes(['verify' => true]);

// Маршруты видимой части магазина
Route::group(['namespace' => 'Shop'], function () {

    Route::get('/', 'MainController@index')->name('shop.main');
    Route::get('/orders', 'MainController@orders')->name('shop.orders');

    Route::get('/{category}', 'MainController@category')
        ->where('category', '^((?!admin|orders|payment|cart$|/).)*$')
        ->name('shop.category');

    Route::get('/{category}/{slug}', 'MainController@product')
        ->where('category', '^((?!admin|orders|payment|cart/).)*$')
        ->name('shop.product');

    // Корзина товаров
    Route::get('/cart', 'CartController@index')->name('shop.cart.index');
    Route::put('/cart', 'CartController@add')->name('shop.cart.add');
    Route::patch('/cart', 'CartController@changeQty')->name('shop.cart.qty');
    Route::delete('/cart/{id}', 'CartController@delete')->name('shop.cart.delete');
    Route::delete('/cart', 'CartController@clean')->name('shop.cart.clean');
    Route::post('/cart/checkout', 'CartController@checkout')->name('shop.cart.checkout');

    // Webmoney
    Route::get('/payment/{id}', 'PaymentController@webmoney')->name('shop.payment.webmoney');
    Route::post('/M4mhQACA', 'PaymentController@result')->name('webmoney.result');
    Route::post('/payment/success', function () {
        return view('Shop.success');
    });
    Route::post('/payment/fail', function () {
        return view('Shop.fail');
    });

});

// Маршруты админки
Route::group(['namespace' => 'Shop\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'manager']], function () {

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

    // Пользователи
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/users', 'UserController@index')->name('shop.admin.users');
        Route::post('/users', 'UserController@addRole')->name('shop.admin.users.addRole');
        Route::patch('/users', 'UserController@deleteRole')->name('shop.admin.users.deleteRole');
    });

    // Заказы
    Route::resource('orders', 'OrderController')
        ->only(['index', 'edit', 'update', 'destroy'])
        ->names('shop.admin.orders');
    Route::get('/orders/archived', 'OrderController@archived')
        ->name('shop.admin.orders.archived');
    Route::delete('/orders/{id}/archivation', 'OrderController@toArchive')
        ->name('shop.admin.orders.toArchive');
    Route::get('/orders/{id}/restore', 'OrderController@restore')
        ->name('shop.admin.orders.restore');
});
