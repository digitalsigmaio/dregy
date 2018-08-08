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
        $this->call([
            // Basic Seeders
            RegionSeeder::class,
            CitySeeder::class,
            DegreeSeeder::class,
            ProductAdCategorySeeder::class,
            JobAdCategorySeeder::class,
            JobExperienceLevelSeeder::class,
            JobEmploymentTypeSeeder::class,
            JobTypeSeeder::class,
            JobEducationLevelSeeder::class,
            HospitalSpecialitySeeder::class,
            ClinicSpecialitySeeder::class,
            CosmeticClinicSpecialitySeeder::class,
            // Dummy Seeders
            AdminSeeder::class,
            UserSeeder::class,
            HospitalSeeder::class,
            CosmeticClinicSeeder::class,
            ClinicSeeder::class,
            PharmacySeeder::class,
            JobAdSeeder::class,
            ProductAdSeeder::class
        ]);
    }
}
