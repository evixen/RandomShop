<?php

namespace App\Http\Controllers\Shop\Admin;


use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;

class MainController extends AdminBaseController
{
    public function index()
    {
        return view('Shop.Admin.main');
    }
}
