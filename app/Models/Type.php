<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $fillable =
        [
            'name',
            'category_id'
        ];

   // public $timestamps = false;
}
