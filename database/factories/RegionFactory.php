<?php

use Faker\Generator as Faker;

$factory->define(App\Region::class, function (Faker $faker) {
    return [
        'ar_name' => $city = $faker->city,
        'en_name' => $city
    ];
});
