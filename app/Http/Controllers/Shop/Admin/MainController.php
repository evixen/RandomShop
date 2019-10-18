<?php

namespace App\Http\Controllers\Shop\Admin;


use App\Repositories\ShopOrderRepository;
use App\Repositories\ShopProductRepository;
use App\Repositories\UserRepository;

class MainController extends AdminBaseController
{

    /**
     * @var ShopProductRepository
     */
    protected $products;

    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @var ShopOrderRepository
     */
    protected $orders;


    public function __construct(ShopProductRepository $products,
                                UserRepository $users,
                                ShopOrderRepository $orders)
    {
        parent::__construct();

        $this->products = $products;
        $this->users = $users;
        $this->orders = $orders;
    }


    public function index()
    {
        $productsCount = $this->products->getCount();

        $usersCount = $this->users->getCount();

        $ordersCount = $this->orders->getCount();

        return view('Shop.Admin.main', compact('productsCount', 'usersCount', 'ordersCount'));
    }
}
