<?php

use Illuminate\Database\Seeder;

class ProductAdCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['ar_name'=>'أعشاب طبية', 'en_name'=>'Herbalists'],
            ['ar_name'=>'مستحضرات تجميل', 'en_name'=>'Cosmetics'],
            ['ar_name'=>'أجهزة طبية', 'en_name'=>'Medical Devices'],
        ];

        \Illuminate\Support\Facades\DB::table('product_ad_categories')->insert($categories);
    }
}
