<?php

namespace App\Observers;

use App\Models\ShopProduct;

class ShopProductObserver
{
    /**
     * Handle the shop product category "creating" event.
     *
     * @param ShopProduct $shopProduct
     * @return void
     */
    public function creating(ShopProduct $shopProduct)
    {
        $this->setSlug($shopProduct);
    }


    /**
     * Handle the shop product category "updating" event.
     *
     * @param ShopProduct $shopProduct
     * @return void
     */
    public function updating(ShopProduct $shopProduct)
    {
        $this->setSlug($shopProduct);
    }


    /**
     * Если поле slug пустое - заполняем его конвертацией из заголовка.
     *
     * @param ShopProduct $product
     */
    protected function setSlug(ShopProduct $product)
    {
        if (empty($product->slug)) {
            $product->slug = \Str::slug($product->name);
        }
    }
}
