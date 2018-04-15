<?php

use Faker\Generator as Faker;

$factory->define(App\HospitalSpeciality::class, function (Faker $faker) {
    return [
        'hospital_id' => rand(1, 20),
        'speciality_id' => rand(1, 15),
    ];
});
