<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

class Wardrobe extends Model
{
    protected $table = 'wardrobe';
    protected $fillable =
        [
            'name',
            'creator_id'
        ];
}
