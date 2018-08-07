<?php

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions =  [
            ['id'=>1, 'ar_name'=>'الإسكندرية', 'en_name'=>'Alexandria'],
            ['id'=>2, 'ar_name'=>'أسوان', 'en_name'=>'Aswan'],
            ['id'=>3, 'ar_name'=>'أسيوط', 'en_name'=>'Asyut'],
            ['id'=>4, 'ar_name'=>'البحيرة', 'en_name'=>'Beheira'],
            ['id'=>5, 'ar_name'=>'بني سويف', 'en_name'=>'Beni Suef'],
            ['id'=>6, 'ar_name'=>'القاهرة', 'en_name'=>'Cairo'],
            ['id'=>7, 'ar_name'=>'الدقهلية', 'en_name'=>'Dakahlia'],
            ['id'=>8, 'ar_name'=>'دمياط', 'en_name'=>'Damietta'],
            ['id'=>9, 'ar_name'=>'الفيوم', 'en_name'=>'Faiyum'],
            ['id'=>10, 'ar_name'=>'الغربية', 'en_name'=>'Gharbia'],
            ['id'=>11, 'ar_name'=>'الجيزة', 'en_name'=>'Giza'],
            ['id'=>12, 'ar_name'=>'الإسماعيلية', 'en_name'=>'Ismailia'],
            ['id'=>13, 'ar_name'=>'كفر الشيخ', 'en_name'=>'Kafr El Sheikh'],
            ['id'=>14, 'ar_name'=>'الأقصر', 'en_name'=>'Luxor'],
            ['id'=>15, 'ar_name'=>'مطروح', 'en_name'=>'Matruh'],
            ['id'=>16, 'ar_name'=>'المنيا', 'en_name'=>'Minya'],
            ['id'=>17, 'ar_name'=>'المنوفية', 'en_name'=>'Monufia'],
            ['id'=>18, 'ar_name'=>'الوادي الجديد', 'en_name'=>'New Valley'],
            ['id'=>19, 'ar_name'=>'شمال سيناء', 'en_name'=>'North Sinai'],
            ['id'=>20, 'ar_name'=>'بورسعيد', 'en_name'=>'Port Said'],
            ['id'=>21, 'ar_name'=>'القليوبية', 'en_name'=>'Qalyubia'],
            ['id'=>22, 'ar_name'=>'قنا', 'en_name'=>'Qena'],
            ['id'=>23, 'ar_name'=>'البحر الأحمر', 'en_name'=>'Red Sea'],
            ['id'=>24, 'ar_name'=>'الشرقية', 'en_name'=>'Sharqia'],
            ['id'=>25, 'ar_name'=>'سوهاج', 'en_name'=>'Sohag'],
            ['id'=>26, 'ar_name'=>'جنوب سيناء', 'en_name'=>'South Sinai'],
            ['id'=>27, 'ar_name'=>'السويس', 'en_name'=>'Suez'],
        ];

        \Illuminate\Support\Facades\DB::table('regions')->insert($regions);
    }
}
