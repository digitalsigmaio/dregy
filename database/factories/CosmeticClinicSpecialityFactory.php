<?php

use Faker\Generator as Faker;

$factory->define(App\CosmeticClinicSpeciality::class, function (Faker $faker) {
    return [
        'cosmetic_clinic_id' => rand(1, 20),
        'speciality_id' => rand(1, 15),
    ];
});
