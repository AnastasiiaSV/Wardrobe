<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable =
        [
            'name'
        ];

    public $timestamps = false;
}
