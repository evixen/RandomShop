<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopProduct extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'name',
            'slug',
            'category_id',
            'details',
            'price'
        ];

    public $timestamps = false;


    public function category()
    {
        return $this->belongsTo(ShopProductCategory::class);
    }
}
