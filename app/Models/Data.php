<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'product_id',
        'retailer_id',
        'title',
        'description',
        'price',
        'stock_count',
        'rating',
        'avg_rating',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'rating' => 'array',
    ];
}
