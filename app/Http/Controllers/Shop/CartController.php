<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\ShopOrderCreateRequest;
use App\Models\ShopOrder;
use Carbon\Carbon;
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
        \ShoppingCart::associate('App\Models\ShopProduct');

        \ShoppingCart::add($request->id, $request->name, 1, $request->price,
            ['slug' => $request->slug, 'category' => $request->category]);

        return back()->with('success', 'Добавлено в корзину');
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

        return back()->with('success', 'Корзина очищена');
    }


    /**
     * Сохраняет заказ
     *
     * @param ShopOrderCreateRequest $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function checkout(ShopOrderCreateRequest $request)
    {
        $data = $request->input();

        // Генерация уникального ключа заказа
        $data['order_id'] = bin2hex(random_bytes(10));

        $data['user_id'] = \Auth::user()->id ?? 0;
        $data['price'] = \ShoppingCart::totalPrice();

        $now = Carbon::now();

        $data['created_at'] = $now;
        $data['updated_at'] = $now;


        // Сохраняем данные
        $order = new ShopOrder($data);

        $result = $order->save();

        if ($result) {
            return redirect()
                ->route('shop.cart.index')
                ->with(['success' => 'Ваш заказ успешо сохранён']);
        } else {
            return back()
                ->withErrors(['msg' => "Ошибка сохранения"])
                ->withInput();
        }
    }
}
