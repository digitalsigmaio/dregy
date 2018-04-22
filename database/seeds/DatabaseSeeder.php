<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory('App\Admin', 5)->create();
        factory('App\User', 100)->create();
        factory('App\Region', 13)->create()->each(function ($r) {
            $r->cities()->saveMany(factory('App\City', 20)->make());
        });

        factory('App\Speciality', 15)->create();
        factory('App\Degree', 8)->create();
        factory('App\ProductAdCategory', 6)->create();
        factory('App\JobAdCategory', 6)->create();
        factory('App\JobExperienceLevel', 5)->create();
        factory('App\JobEmploymentType', 4)->create();
        factory('App\JobType', 2)->create();
        factory('App\JobEducationLevel', 6)->create();

        factory('App\Hospital', 20)->create()->each(function ($h){
            $h->phoneNumbers()->saveMany(factory('App\PhoneNumber', 2)->make());
            $h->favorites()->saveMany(factory('App\Favorite', 20)->make());
            $h->views()->saveMany(factory('App\View', 200)->make());
            $h->rates()->saveMany(factory('App\Rate', 20)->make());
            $h->premium()->save(factory('App\Premium')->make());
        });

        factory('App\BeautyCenter', 20)->create()->each(function ($h){
            $h->phoneNumbers()->saveMany(factory('App\PhoneNumber', 2)->make());
            $h->favorites()->saveMany(factory('App\Favorite', 20)->make());
            $h->views()->saveMany(factory('App\View', 200)->make());
            $h->rates()->saveMany(factory('App\Rate', 20)->make());
            $h->premium()->save(factory('App\Premium')->make());
        });

        factory('App\Clinic', 20)->create()->each(function ($h){
            $h->phoneNumbers()->saveMany(factory('App\PhoneNumber', 2)->make());
            $h->favorites()->saveMany(factory('App\Favorite', 20)->make());
            $h->views()->saveMany(factory('App\View', 200)->make());
            $h->rates()->saveMany(factory('App\Rate', 20)->make());
            $h->premium()->save(factory('App\Premium')->make());
        });

        factory('App\Pharmacy', 20)->create()->each(function ($h){
            $h->phoneNumbers()->saveMany(factory('App\PhoneNumber', 2)->make());
            $h->favorites()->saveMany(factory('App\Favorite', 20)->make());
            $h->views()->saveMany(factory('App\View', 200)->make());
            $h->rates()->saveMany(factory('App\Rate', 20)->make());
            $h->premium()->save(factory('App\Premium')->make());
        });

        factory('App\JobAd', 20)->create()->each(function ($h){
            $h->phoneNumbers()->saveMany(factory('App\PhoneNumber', 2)->make());
            $h->favorites()->saveMany(factory('App\Favorite', 20)->make());
            $h->views()->saveMany(factory('App\View', 200)->make());
            $h->premium()->save(factory('App\Premium')->make());
        });

        factory('App\ProductAd', 20)->create()->each(function ($h){
            $h->phoneNumbers()->saveMany(factory('App\PhoneNumber', 2)->make());
            $h->favorites()->saveMany(factory('App\Favorite', 20)->make());
            $h->views()->saveMany(factory('App\View', 200)->make());
            $h->premium()->save(factory('App\Premium')->make());
        });

        factory('App\HospitalSpeciality', 100)->create();
        factory('App\BeautyCenterSpeciality', 100)->create();
        factory('App\ClinicSpeciality', 100)->create();
    }
}
