<?php

use Faker\Generator as Faker;

$factory->define(Wardrobe\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'country_id' => $faker->randomDigit,
        'city_id' => $faker->randomDigit
    ];
});

$factory->define(Wardrobe\Models\Country::class, function (Faker $faker) {
    static $password;

    return [
        'id' => '1',
        'name' => $faker->name,
    ];
});

$factory->define(Wardrobe\Models\City::class, function (Faker $faker) {
    static $password;

    return [
        'id' => $faker->randomDigit,
        'name' => $faker->name,
        'country_id' => '1'
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