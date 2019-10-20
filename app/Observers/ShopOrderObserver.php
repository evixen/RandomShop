<?php

namespace App\Observers;

use App\Models\ShopOrder;
use Carbon\Carbon;

class ShopOrderObserver
{
    /**
     * Handle the shop product category "created" event.
     *
     * @param ShopOrder $order
     * @return void
     */
    public function created(ShopOrder $order)
    {
        // В сводной таблице заказ получает все купленные товары и их количество
        $now = Carbon::now();

        foreach (\ShoppingCart::all() as $product) {
            $order->products()->attach($product->id,
                ['quantity' => $product->qty, 'created_at' => $now, 'updated_at' => $now]);
        }
    }


    /**
     * Handle the shop product category "updating" event.
     *
     * @param ShopOrder $order
     */
    public function updating(ShopOrder $order)
    {

    }
}
