<?php

use Faker\Generator as Faker;

$factory->define(App\HospitalSpeciality::class, function (Faker $faker) {
    return [
        'hospital_id' => rand(1, 30),
        'ar_name' => $sp = $faker->word,
        'en_name' => $sp,
    ];
});
