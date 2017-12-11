<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    //Fields of this entity that can be changed from app
    //All fields are in migrations
    protected $fillable = ['name', 'type_id', 'path', 'creator_id', 'category_id', 'season_id', 'place_id'];
    public $timestamps = false;
}
