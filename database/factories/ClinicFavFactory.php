<?php

use Faker\Generator as Faker;

$factory->define(App\ClinicFav::class, function (Faker $faker) {
    return [
        'clinic_id' => rand(1, 20),
        'user_id' => rand(1, 100),
    ];
});
