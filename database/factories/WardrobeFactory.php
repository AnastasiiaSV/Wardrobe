<?php

use Faker\Generator as Faker;

$factory->define(Wardrobe\Models\Wardrobe::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'creator_id' => $faker->randomDigit
    ];
});

