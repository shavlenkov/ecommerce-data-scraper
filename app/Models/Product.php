<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'manufacturer_part_number',
        'pack_size_id',
    ];

    public function retailers(): BelongsToMany
    {
        return $this->belongsToMany(Retailer::class, 'product_retailers')
            ->withPivot('product_url');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function data(): HasMany
    {
        return $this->hasMany(Data::class);
    }

    public function pack_size(): BelongsTo
    {
        return $this->belongsTo(PackSize::class);
    }
}
