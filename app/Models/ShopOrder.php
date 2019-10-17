<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShopOrder extends Model
{
    use SoftDeletes;

    protected $fillable =
        [
            'user_id',
            'order_id',
            'receiver_name',
            'email',
            'price',
            'address',
            'comment',
            'phone',
            'is_checked',
            'is_paid'
        ];

    public function products()
    {
        return $this->belongsToMany(ShopProduct::class, 'order_product',
            'order_id', 'product_id')->withPivot('quantity')->withTimestamps();
    }
}
