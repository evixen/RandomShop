<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;

class CartController extends GuestBaseController
{

    /**
     * Показывает список товаров в корзине
     *
     * @return Response
     */
    public function index()
    {
        return view('Shop.cart');
    }


    /**
     * Добавляет товар в корзину
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function add(Request $request)
    {
        \ShoppingCart::add($request->id, $request->name, 1, $request->price,
            ['slug' => $request->slug, 'category' => $request->category]);

        \ShoppingCart::associate('App\Models\ShopProduct');

        return back()->with('success_message', 'Добавлено в корзину');
    }


    /**
     * Удаляет товар из корзины
     *
     * @param $rawId
     * @return RedirectResponse
     */
    public function delete($rawId)
    {
        \ShoppingCart::remove($rawId);

        return back();
    }


    /**
     * Очищает корзину
     *
     * @return Response
     */
    public function clean()
    {
        \ShoppingCart::destroy();

        return back()->with('success_message', 'Корзина очищена');
    }
}
