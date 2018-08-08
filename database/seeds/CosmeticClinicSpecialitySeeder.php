<?php

use Illuminate\Database\Seeder;

class CosmeticClinicSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            ['ar_name'=>'تعزيز الثدي', 'en_name'=>'Breast Enhancement'],
            ['ar_name'=>'تحديد الوجه', 'en_name'=>'Facial Contouring'],
            ['ar_name'=>'تجديد شباب الوجه', 'en_name'=>'Facial Rejuvenation'],
            ['ar_name'=>'نحت الجسم', 'en_name'=>'Body Contouring'],
        ];

        \Illuminate\Support\Facades\DB::table('cosmetic_clinic_specialities')->insert($specialities);
    }
}
