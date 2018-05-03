<?php

use Faker\Generator as Faker;

$factory->define(App\ClinicSpeciality::class, function (Faker $faker) {
    return [
        'clinic_id' => rand(1, 30),
        'ar_name' => $sp = $faker->word,
        'en_name' => $sp,
    ];
});
