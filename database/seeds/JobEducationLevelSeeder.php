<?php

use Illuminate\Database\Seeder;

class JobEducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educationLevels = [
            ['ar_name'=>'بدون مؤهل', 'en_name'=>'No Qualification'],
            ['ar_name'=>'مؤهل متوسط', 'en_name'=>'High School'],
            ['ar_name'=>'مؤهل عالي', 'en_name'=>'Bachelor\'s Degree'],
            ['ar_name'=>'ماجستير', 'en_name'=>'Master\'s Degree'],
            ['ar_name'=>'دكتوراة', 'en_name'=>'PhD Degree'],
        ];

        \Illuminate\Support\Facades\DB::table('job_education_levels')->insert($educationLevels);
    }
}
