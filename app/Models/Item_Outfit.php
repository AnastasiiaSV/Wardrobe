<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

class Item_Outfit extends Model
{
    protected $table = 'items_outfits';
    protected $fillable =
        [
            'item_id',
            'outfit_id'
        ];
    public $timestamps = false;
}
