<?php

namespace App\Http\Controllers\Shop\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends AdminBaseController
{
    public function index()
    {
        return view('Shop.Admin.main');
    }
}
