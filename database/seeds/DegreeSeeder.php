<?php

use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $degrees = [
            ['ar_name' =>'أستاذ', 'en_name'=>'Professor'],
            ['ar_name' =>'مدرس', 'en_name'=>'Lecturer'],
            ['ar_name' =>'استشاري', 'en_name'=>'Consultant'],
            ['ar_name' =>'أخصائي', 'en_name'=>'Specialist'],
        ];

        \Illuminate\Support\Facades\DB::table('degrees')->insert($degrees);
    }
}
