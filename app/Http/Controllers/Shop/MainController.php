<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopProduct;

class MainController extends BaseController
{
    public function index()
    {
        $products = ShopProduct::inRandomOrder()
            ->with('category:id,title,slug')
            ->paginate(8);

        return view('Shop.main', compact('products'));
    }

    public function category($category)
    {
        $products = ShopProduct::with('category:id,slug')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            })->inRandomOrder()->get();

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
        $product = ShopProduct::where('slug', $slug)->with('category:id,slug')->firstOrFail();

        return view('Shop.product', compact('product'));
    }
}
