<?php

use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['ar_name'=>'وظيفة', 'en_name'=>'Job'],
            ['ar_name'=>'باحث عن وظيفة', 'en_name'=>'Job Seeker'],
        ];

        \Illuminate\Support\Facades\DB::table('job_types')->insert($types);
    }
}
