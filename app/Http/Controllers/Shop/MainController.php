<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopProduct;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    public function index()
    {
        $products = ShopProduct::inRandomOrder()->get();

        return view('Shop.main', compact('products'));
    }

    public function show($slug)
    {
        $product = ShopProduct::where('slug', $slug)->firstOrFail();

        return view('Shop.product', compact('product'));
    }
}
