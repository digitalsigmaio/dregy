<?php

use Faker\Generator as Faker;

$factory->define(App\JobEmploymentType::class, function (Faker $faker) {
    return [
        'ar_name' => $sp = $faker->randomElement(['Freelance', 'Part-time', 'Full-time', 'Internship']),
        'en_name' => $sp,
    ];
});
