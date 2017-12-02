<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

class Wardrobe_Item extends Model
{
    protected $table = 'wardrobes_items';
    protected $fillable =
        [
            'wardrobe_id',
            'item_id'
        ];
    public $timestamps = false;
}
