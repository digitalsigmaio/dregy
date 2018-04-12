<?php

use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
    return [
        'ar_name' => $city = $faker->city,
        'en_name' => $city,
        'region_id' => rand(1, 13)
    ];
});
