<?php

use Faker\Generator as Faker;

$factory->define(App\BeautyCenterSpeciality::class, function (Faker $faker) {
    return [
        'beauty_center_id' => rand(1, 20),
        'speciality_id' => rand(1, 15),
    ];
});
