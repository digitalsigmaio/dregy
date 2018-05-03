<?php

use Faker\Generator as Faker;

$factory->define(App\CosmeticClinicSpeciality::class, function (Faker $faker) {
    return [
        'cosmetic_clinic_id' => rand(1, 30),
        'ar_name' => $sp = $faker->word,
        'en_name' => $sp,
    ];
});
