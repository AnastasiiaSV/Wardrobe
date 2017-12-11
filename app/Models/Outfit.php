<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    protected $fillable = ['name', 'creator_id', 'declaration', 'wardrobe_id'];
    public $timestamps = false;
}
