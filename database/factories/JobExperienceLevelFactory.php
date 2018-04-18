<?php

use Faker\Generator as Faker;

$factory->define(App\JobExperienceLevel::class, function (Faker $faker) {
    return [
        'ar_name' => $sp = $faker->word,
        'en_name' => $sp,
    ];
});
