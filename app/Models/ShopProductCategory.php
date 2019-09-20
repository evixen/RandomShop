<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopProductCategory extends Model
{
    use SoftDeletes;

//    protected $fillable =
//        [
//            'title',
//            'slug',
//            'parent_id',
//            'description',
//        ];

    static public function getCategoriesForMenu()
    {

    }
}
