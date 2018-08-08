<?php

use Illuminate\Database\Seeder;

class JobEmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employmentTypes = [
            ['ar_name'=>'دوام كامل', 'en_name'=>'Full Time'],
            ['ar_name'=>'تدريب', 'en_name'=>'Internship'],
            ['ar_name'=>'دوام جزئى', 'en_name'=>'Part Time'],
            ['ar_name'=>'عمل من المنزل', 'en_name'=>'Work From Home'],
            ['ar_name'=>'مستقل / مشروع', 'en_name'=>'Freelance / Project'],
            ['ar_name'=>'عمل تطوعي', 'en_name'=>'Volunteering'],
        ];

        \Illuminate\Support\Facades\DB::table('job_employment_types')->insert($employmentTypes);
    }
}
