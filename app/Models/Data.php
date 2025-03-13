<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data extends Model
{
    use HasFactory;

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
