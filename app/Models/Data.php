<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_retailer_id',
        'title',
        'description',
        'price',
        'stock_count',
        'rating',
        'avg_rating',
    ];

    protected $casts = [
        'rating' => 'array',
    ];

    public function retailer(): BelongsTo
    {
        return $this->belongsTo(ProductRetailer::class);
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(ScrapingSession::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(DataImage::class);
    }

    public function scopeHistoryImages(Builder $query, $date = null): Builder
    {
        if ($date) {
            return $query->whereHas('images', function ($query) use ($date) {
                $query->whereDate('created_at', $date);
            });
        }

        return $query;
    }
}
