<?php

namespace App\Observers;

use App\Models\ShopProductCategory;

class ShopProductCategoryObserver
{

    /**
     * Handle the shop product category "creating" event.
     *
     * @param ShopProductCategory $shopProductCategory
     * @return void
     */
    public function creating(ShopProductCategory $shopProductCategory)
    {
        $this->setSlug($shopProductCategory);

        $this->setMenuLevel($shopProductCategory);
    }


    /**
     * Handle the shop product category "updating" event.
     *
     * @param ShopProductCategory $shopProductCategory
     * @return void
     */
    public function updating(ShopProductCategory $shopProductCategory)
    {
        $this->setSlug($shopProductCategory);

        $this->setMenuLevel($shopProductCategory);
    }


    /**
     * Если поле slug пустое - заполняем его конвертацией из заголовка.
     *
     * @param ShopProductCategory $category
     */
    protected function setSlug(ShopProductCategory $category)
    {
        if (empty($category->slug)) {
            $category->slug = \Str::slug($category->title);
        }
    }


    /**
     * Заполняем поле menu_level для вывода в меню.
     * Если есть родительская категория - уровень вложенности меню на один выше,
     * если нет - уровень 1.
     *
     * @param ShopProductCategory $category
     */
    protected function setMenuLevel(ShopProductCategory $category)
    {
        if (!empty($category->parent->menu_level)) {
            $category->menu_level = $category->parent->menu_level + 1;
        } else {
            $category->menu_level = 1;
        }
    }
}
