<?php

namespace App\Providers;

use App\Models\ShopOrder;
use App\Models\ShopProductCategory;
use App\Models\ShopProduct;
use App\Models\User;
use App\Observers\ShopOrderObserver;
use App\Observers\ShopProductCategoryObserver;
use App\Observers\ShopProductObserver;
use App\Observers\UserObserver;
use App\Repositories\ShopProductCategoryRepository;
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
        \Schema::defaultStringLength(191);

        ShopProductCategory::observe(ShopProductCategoryObserver::class);
        ShopProduct::observe(ShopProductObserver::class);
        User::observe(UserObserver::class);
        ShopOrder::observe(ShopOrderObserver::class);

        // Вывод в панель навигации и админку массива категорий меню
        \View::composer(['layouts.includes.shop-nav2', 'Shop.Admin.categories.index'], function ($view) {

            $categories = app(ShopProductCategoryRepository::class);

            $menu = $categories->getMenu();

            $view->with('menu', $menu);
        });
    }
}
