<?php

use Illuminate\Database\Seeder;

class HospitalSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            ['ar_name'=>'مستشفى عام', 'en_name'=>'Public Hospital'],
            ['ar_name'=>'مستشفى خاص', 'en_name'=>'Private Hospital'],
            ['ar_name'=>'مستشفى جامعي', 'en_name'=>'University Hospital'],
            ['ar_name'=>'مستشفى طوارئ', 'en_name'=>'Emergency Hospital'],
            ['ar_name'=>'مستشفى ولادة', 'en_name'=>'Maternity Hospital'],
        ];

        \Illuminate\Support\Facades\DB::table('hospital_specialities')->insert($specialities);
    }
}
