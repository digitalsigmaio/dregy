<?php

use Faker\Generator as Faker;

$factory->define(App\JobAdminReview::class, function (Faker $faker) {
    return [
        'job_ad_id' => rand(1, 20),
        'admin_id' => rand(1, 5),
        'approved' => $faker->boolean(90)
    ];
});
