<?php

use Faker\Generator as Faker;

$factory->define(Wardrobe\Models\Item::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'path' => str_random(10),
        'creator_id' => $faker->randomDigit,
        'type_id' => $faker->randomDigit
    ];
});

$factory->define(Wardrobe\Models\Type::class, function (Faker $faker) {
    static $password;

    return [
        'id' => '1',
        'name' => $faker->name,
    ];
});



/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/