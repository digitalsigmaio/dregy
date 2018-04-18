<?php

use Faker\Generator as Faker;

$factory->define(App\PharmacyFav::class, function (Faker $faker) {
    return [
        'pharmacy_id' => rand(1, 20),
        'user_id' => rand(1, 100),
    ];
});
