<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_id',
        'image_filename',
        'image_url',
        'position',
    ];

    public function data(): BelongsTo
    {
        return $this->belongsTo(Data::class);
    }
}
