<?php

namespace App\Providers;

use App\Models\ShopProductCategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Вывод в панель навигации (layouts.nav2) массива категорий меню

        \View::composer(['layouts.shop-nav2', 'Shop.Admin.categories.index'], function ($view) {

            $menu = [];

            $columns = ['id', 'title', 'parent_id', 'menu_level'];

            $categories = ShopProductCategory::with('parent:id,title,parent_id')
                ->select($columns)->get();

            foreach ($categories as $cat) {
                if ($cat->menu_level == 3) {

                    $catLevelOneTitle = $categories[$cat->parent->parent_id - 1]['title'];

                    $menu[$catLevelOneTitle][$cat->parent->title][] = $cat->title;
                }

                // Проверяем наличие "пустых" категорий первого и второго уровня
                if ($cat->menu_level == 1 AND array_key_exists($cat->title, $menu) == false) {
                    $menu[$cat->title] = [];
                }

                if ($cat->menu_level == 2) {
                    foreach ($menu as $menuLevelTwo) {
                        if (array_key_exists($cat->title, $menuLevelTwo))
                            continue;

                        $menu[$cat->parent->title][$cat->title] = [];
                    }
                }
            }


            $view->with('menu', $menu);
        });
    }
}
