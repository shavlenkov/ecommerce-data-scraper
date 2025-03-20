<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Retailer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'currency',
        'logo',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(ProductRetailer::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(ScrapingSession::class);
    }
}
