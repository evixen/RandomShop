<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopProduct;
use App\Repositories\ShopProductCategoryRepository;
use App\Repositories\ShopProductRepository;

class MainController extends GuestBaseController
{
    /*
     * @var ShopProductRepository
     */
    protected $products;

    /*
     * @var ShopProductCategoryRepository
     */
    protected $categories;


    public function __construct(ShopProductRepository $products, ShopProductCategoryRepository $categories)
    {
        parent::__construct();

        $this->products = $products;
        $this->categories = $categories;
    }


    public function index()
    {

        /**
         * Формируем массив для каруселей товаров на главной странице
         * [][$title => $collect],
         * где $title - название главной категории, $collect - коллекция товаров, входящих в неё
         */

        $productsByCategory = [];

        $categories = [];

        $mainCat = $this->categories->getMainCategories(); // id и title главных категорий

        foreach ($mainCat as $cat) {

            $childrenId = $this->categories->getLevelThreeChildrenId($cat->id); // id детей текущей главной категории

            $productsCollection = $this->products->getProductsByCategories($childrenId)->shuffle();

            $productsByCategory[$cat->id] = $productsCollection;

            $categories[$cat->id] = $cat->title;
        }

        return view('Shop.main', compact('productsByCategory', 'categories'));
    }


    public function category($category)
    {
        $products = ShopProduct::with('category:id,slug')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            })
            ->inRandomOrder()
            ->get();

        // Сортировка по цене
        if (request()->sort == 'low_high') {
            $products = $products->sortBy('price');
        } elseif (request()->sort == 'high_low') {
            $products = $products->sortByDesc('price');
        }


        if ($products->isEmpty())
            abort(404);

        return view('Shop.category', compact('category', 'products'));
    }

    public function product($category, $slug)
    {
        $product = ShopProduct::where('slug', $slug)
            ->with('category:id,slug')
            ->firstOrFail();

        return view('Shop.product', compact('product'));
    }
}
