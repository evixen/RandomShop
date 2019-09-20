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
        // Вывод меню категорий во все шаблоны
        \View::composer('*', function ($view) {

            $menu = [];

            $columns = ['id', 'title', 'parent_id', 'menu_level'];

            $categories = ShopProductCategory::select($columns)->get();


            for ($i = 0; $i < $categories->count(); $i++) {

                if ($categories[$i]['menu_level'] == 3) {

                    $secondLevelId = $categories[$i]['parent_id'];

                    $secondLevelTitle = $categories[$secondLevelId - 1]['title'];

                    $secondLevel = $categories->where('title', $secondLevelTitle)->first();


                    $firstLevelId = $secondLevel['parent_id'];

                    $firstLevel = $categories->where('id', $firstLevelId)->first();

                    $firstLevelTitle = $firstLevel['title'];


                    $menu[$firstLevelTitle][$secondLevelTitle][] = $categories[$i]['title'];
                }
            }

            $view->with('menu', $menu);
        });
    }
}
