<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataImage extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'data_id',
        'image_id',
    ];
}
