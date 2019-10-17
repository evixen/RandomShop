<?php

namespace App\Http\Controllers\Shop;

use App\Repositories\ShopOrderRepository;
use App\Repositories\ShopProductCategoryRepository;
use App\Repositories\ShopProductRepository;
use Illuminate\View\View;

class MainController extends GuestBaseController
{
    /**
     * @var ShopProductRepository
     */
    protected $products;

    /**
     * @var ShopProductCategoryRepository
     */
    protected $categories;

    /**
     * @var ShopOrderRepository
     */
    protected $orders;


    public function __construct(ShopProductRepository $products,
                                ShopProductCategoryRepository $categories,
                                ShopOrderRepository $orders)
    {
        parent::__construct();

        $this->products = $products;
        $this->categories = $categories;
        $this->orders = $orders;
    }


    /**
     * Главная страница
     *
     * @return View
     */
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

            $productsCollection = $this->products->getProductsByCategoriesIdArray($childrenId)->shuffle();

            $productsByCategory[$cat->id] = $productsCollection;

            $categories[$cat->id] = $cat->title;
        }

        return view('Shop.main', compact('productsByCategory', 'categories'));
    }


    /**
     * Страница заказов пользоватея
     *
     * @return RedirectResponse|View
     */
    public function orders()
    {
        if (\Auth::check()) {
            $email = \Auth::user()->email;

            $orders = $this->orders->getOrdersByUserEmail($email);

            return view('Shop.orders', compact('orders'));
        } else {
            return redirect()->route('shop.main');
        }
    }


    /**
     * Страница категории товаров
     *
     * @param $categorySlug
     * @return View
     */
    public function category($categorySlug)
    {
        $products = $this->products->getProductsByCategory($categorySlug);

        // Сортировка по цене
        if (request()->sort == 'low_high') {
            $products = $products->sortBy('price');
        } elseif (request()->sort == 'high_low') {
            $products = $products->sortByDesc('price');
        }

        if ($products->isEmpty())
            abort(404);

        return view('Shop.category', compact('categorySlug', 'products'));
    }


    /**
     * Страница товара
     *
     * @param $categorySlug
     * @param $slug
     * @return View
     */
    public function product($categorySlug, $slug)
    {
        $product = $this->products->getOneBySlug($slug);

        // Другие товары из той же категории
        $others = $this->products->getSeeAlso($product->category_id, $product->id);

        if (empty($product))
            abort(404);

        return view('Shop.product', compact('product', 'others'));
    }
}
