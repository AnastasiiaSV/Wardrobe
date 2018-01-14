<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';

    protected $fillable =
        [
            'name'
        ];

    public $timestamps = false;
}
