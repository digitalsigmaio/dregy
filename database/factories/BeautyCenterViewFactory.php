<?php

use Faker\Generator as Faker;

$factory->define(App\BeautyCenterView::class, function (Faker $faker) {
    return [
        'beauty_center_id' => rand(1, 20),
        'user_id' => rand(1, 100)
    ];
});
