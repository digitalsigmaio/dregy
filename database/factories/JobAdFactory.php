<?php

use Faker\Generator as Faker;

$factory->define(App\JobAd::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'title' => $title = $faker->jobTitle,
        'description' => $faker->text(100),
        'slug' => str_slug($title),
        'salary' => $faker->randomNumber(4),
        'ref_id' => '#DEJA' . str_random(6) . time(),
        'job_ad_category_id' => rand(1, 6),
        'job_experience_level_id' => rand(1, 5),
        'job_employment_type_id' => rand(1, 4),
        'job_type_id' =>  rand(1, 2),
        'job_education_level_id' => rand(1, 6),
        'region_id' => $region = rand(1, 13),
        'city_id' => \App\Region::find($region)->cities()->inRandomOrder()->first()->id,
        'address' => $faker->streetAddress,
        'img' => $faker->imageUrl(640, 480),
        'approved' => $faker->boolean(90),
        'admin_id' => rand(1, 5)
    ];
});
