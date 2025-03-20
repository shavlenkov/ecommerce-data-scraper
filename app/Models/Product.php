<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'manufacturer_part_number',
        'pack_size_id',
    ];

    public function retailers(): HasMany
    {
        return $this->hasMany(ProductRetailer::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function data(): HasMany
    {
        return $this->hasMany(Data::class);
    }
}
