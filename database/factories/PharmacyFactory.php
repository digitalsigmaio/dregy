<?php

use Faker\Generator as Faker;

$factory->define(App\Pharmacy::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 100),
        'admin_id' => rand(1, 5),
        'ar_name' => $name = $faker->company,
        'en_name' => $name,
        'slug' => str_slug($name),
        'region_id' => $region = rand(1, 13),
        'city_id' => \App\Region::find($region)->cities()->inRandomOrder()->first()->id,
        'ar_address' => $address = $faker->streetAddress,
        'en_address' => $address,
        'ar_note' => $note = $faker->text(50),
        'en_note' => $note,
        'delivery' => $faker->boolean(70),
        'ar_work_times' => 'From 9 a.m to 5 p.m',
        'en_work_times' => 'From 9 a.m to 5 p.m',
        'full_time' => $faker->boolean(70),
        'website' => $faker->domainName,
        'email' => $faker->companyEmail,
        'img' => $faker->imageUrl(640, 480),
    ];
});
