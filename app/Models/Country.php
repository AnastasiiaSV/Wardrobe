<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable =
        [
            'name'
        ];

    public $timestamps = false;
}
