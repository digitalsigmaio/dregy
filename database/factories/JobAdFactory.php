<?php

use Faker\Generator as Faker;

$factory->define(App\JobAd::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'title' => $faker->name,
        'description' => $faker->text(100),
        'salary' => $faker->randomNumber(4),
        'ref_id' => '#DEJA' . str_random(6) . time(),
        'job_ad_category_id' => rand(1, 6),
        'job_experience_level_id' => rand(1, 5),
        'job_employment_type_id' => rand(1, 4),
        'job_type_id' =>  rand(1, 2),
        'job_education_level_id' => rand(1, 6),
        'region_id' => rand(1, 13),
        'city_id' =>rand(1, 260),
        'address' => $faker->streetAddress,
        'img' => $faker->imageUrl(320, 240),
        'promoted' => $faker->boolean(40)
    ];
});
