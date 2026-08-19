<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'phone', 'address',
        'product_id', 'product_title', 'price',
        'delivery_area', 'delivery_fee', 'total', 'status',
    ];

    protected $casts = [
        'price' => 'integer',
        'delivery_fee' => 'integer',
        'total' => 'integer',
    ];
}