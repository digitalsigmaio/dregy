<?php

use Faker\Generator as Faker;

$factory->define(App\HospitalView::class, function (Faker $faker) {
    return [
        'hospital_id' => rand(1, 20),
        'user_id' => rand(1, 100)
    ];
});
