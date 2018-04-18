<?php

use Faker\Generator as Faker;

$factory->define(App\JobType::class, function (Faker $faker) {
    return [
        'ar_name' => $sp = $faker->randomElement(['Employer', 'Job Seeker']),
        'en_name' => $sp,
    ];
});
