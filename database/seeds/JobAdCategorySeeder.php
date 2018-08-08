<?php

use Illuminate\Database\Seeder;

class JobAdCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['ar_name'=>'طبي', 'en_name'=>'Medical'],
            ['ar_name'=>'تكنولوجيا المعلومات / البرمجيات', 'en_name'=>'IT/Software Development'],
            ['ar_name'=>'مبيعات/تجزئة', 'en_name'=>'Sales/Retail'],
            ['ar_name'=>'هندسة - اتصالات / تكنولوجيا', 'en_name'=>'Engineering - Telecom/Technology'],
            ['ar_name'=>'خدمة العملاء / الدعم', 'en_name'=>'Customer Service/Support'],
            ['ar_name'=>'تسويق / علاقات عامة / إعلان', 'en_name'=>'Marketing/PR/Advertising'],
            ['ar_name'=>'الادارة', 'en_name'=>'Administration'],
            ['ar_name'=>'وسائل الاعلام / الصحافة / النشر', 'en_name'=>'Media/Journalism/Publishing'],
            ['ar_name'=>'هندسة - الميكانيكية / الكهربائية', 'en_name'=>'Engineering - Mechanical/Electrical'],
            ['ar_name'=>'المبدع / تصميم / الفن', 'en_name'=>'Creative/Design/Art'],
            ['ar_name'=>'المحاسبة والمالية', 'en_name'=>'Accounting/Finance'],
        ];

        \Illuminate\Support\Facades\DB::table('job_ad_categories')->insert($categories);
    }
}
