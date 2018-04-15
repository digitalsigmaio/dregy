<?php

use Faker\Generator as Faker;

$factory->define(App\JobAdFav::class, function (Faker $faker) {
    return [
        'job_ad_id' => rand(1, 20),
        'user_id' => rand(1, 100),
    ];
});
