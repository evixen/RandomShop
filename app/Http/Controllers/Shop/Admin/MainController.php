<?php

namespace App\Http\Controllers\Shop\Admin;


class MainController extends AdminBaseController
{
    public function index()
    {
        return view('Shop.Admin.main');
    }
}
