<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataImage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'data_id',
        'image_id',
    ];
}
