<?php

use Illuminate\Database\Seeder;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Pharmacy', 30)->create()->each(function ($h){
            $h->phoneNumbers()->saveMany(factory('App\PhoneNumber', 2)->make());
            $h->favorites()->saveMany(factory('App\Favorite', rand(50, 100))->make());
            $h->views()->saveMany(factory('App\View', rand(100, 200))->make());
            $h->rates()->saveMany(factory('App\Rate', rand(50, 100))->make());
            $h->premium()->save(factory('App\Premium')->make());
        });
    }
}
