<?php

use Faker\Generator as Faker;

$factory->define(App\ClinicSpeciality::class, function (Faker $faker) {
    return [
        'clinic_id' => rand(1, 20),
        'speciality_id' => rand(1, 15),
    ];
});
