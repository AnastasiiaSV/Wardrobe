<?php

namespace Wardrobe\Models;

use Illuminate\Database\Eloquent\Model;

//table "users"
class User extends Model
{
    protected $table = 'users';

    protected $fillable =
        [
            'email',
            'password',
            'name',
            'surname',
            'phone',
            'date_of_birth',
            'country_id',
            'city_id',
            'is_block'
        ];

   // public $timestamps = false;
    public $timestamps = false;
}
