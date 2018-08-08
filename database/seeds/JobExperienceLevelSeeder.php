<?php

use Illuminate\Database\Seeder;

class JobExperienceLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $experienceLevels = [
            ['ar_name'=>'طالب', 'en_name'=>'Student'],
            ['ar_name'=>'مبتديء', 'en_name'=>'Entry Level'],
            ['ar_name'=>'متوسط الخبرة', 'en_name'=>'Experienced (Non-Managerial)'],
            ['ar_name'=>'إدارة', 'en_name'=>'Manager'],
            ['ar_name'=>'إدارة عليا/تنفيذي', 'en_name'=>'Senior Management (e.g VP, CEO)'],
        ];

        \Illuminate\Support\Facades\DB::table('job_experience_levels')->insert($experienceLevels);
    }
}
