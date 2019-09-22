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

        \View::composer('layouts.nav2', function ($view) {

            $menu = [];

            $columns = ['id', 'title', 'parent_id', 'menu_level'];

            $categories = ShopProductCategory::with('parent:id,title,parent_id')
                ->select($columns)->get();

            foreach ($categories as $cat) {
                if ($cat->menu_level == 3) {

                    $catLevelOneTitle = $categories[$cat->parent->parent_id - 1]['title'];

                    $menu[$catLevelOneTitle][$cat->parent->title][] = $cat->title;
                }
            }

            $view->with('menu', $menu);
        });
    }
}
