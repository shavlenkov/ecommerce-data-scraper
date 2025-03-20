<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScrapingSession extends Model
{
    protected $fillable = [
        'retailer_id',
    ];

    public function retailer(): BelongsTo
    {
        return $this->belongsTo(Retailer::class);
    }

    public function data(): HasMany
    {
        return $this->hasMany(Data::class);
    }
}
