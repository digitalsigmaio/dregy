<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            // Alexandria Cities
            ['region_id'=>1, 'ar_name'=>'محطة الرمل', 'en_name'=>'Mahatet El-Raml'],
            ['region_id'=>1, 'ar_name'=>'رشدي', 'en_name'=>'Roshdy'],
            ['region_id'=>1, 'ar_name'=>'سموحة', 'en_name'=>'Smouha'],
            ['region_id'=>1, 'ar_name'=>'سبورتينج', 'en_name'=>'Sporting'],
            ['region_id'=>1, 'ar_name'=>'سيدي جابر', 'en_name'=>'Sidy Gaber'],
            ['region_id'=>1, 'ar_name'=>'لوران', 'en_name'=>'Loran'],
            ['region_id'=>1, 'ar_name'=>'كامب شيزار', 'en_name'=>'Camp Caesar'],
            ['region_id'=>1, 'ar_name'=>'الإبراهيمية', 'en_name'=>'El-Ibrahimia'],
            ['region_id'=>1, 'ar_name'=>'جانكليس', 'en_name'=>'Janaklees'],
            ['region_id'=>1, 'ar_name'=>'ابو قير', 'en_name'=>'Abou Keir'],
            ['region_id'=>1, 'ar_name'=>'الأزاريطه', 'en_name'=>'El-Azarita'],
            ['region_id'=>1, 'ar_name'=>'السيوف', 'en_name'=>'El-Seyouf'],
            ['region_id'=>1, 'ar_name'=>'الشاطبي', 'en_name'=>'El-Shatby'],
            ['region_id'=>1, 'ar_name'=>'العامرية', 'en_name'=>'El-Amreya'],
            ['region_id'=>1, 'ar_name'=>'العجمي', 'en_name'=>'El-Agamy'],
            ['region_id'=>1, 'ar_name'=>'العصافرة', 'en_name'=>'"El-Asafra'],
            ['region_id'=>1, 'ar_name'=>'المنتزه', 'en_name'=>'El-Montazah'],
            ['region_id'=>1, 'ar_name'=>'المندرة', 'en_name'=>'El-Mandara'],
            ['region_id'=>1, 'ar_name'=>'المنشية', 'en_name'=>'El-Mansheyah'],
            ['region_id'=>1, 'ar_name'=>'الورديان', 'en_name'=>'El-Werdeyan'],
            ['region_id'=>1, 'ar_name'=>'باكوس', 'en_name'=>'Bakos'],
            ['region_id'=>1, 'ar_name'=>'بحري', 'en_name'=>'Bahary'],
            ['region_id'=>1, 'ar_name'=>'بولكلي', 'en_name'=>'Bulkly'],
            ['region_id'=>1, 'ar_name'=>'جليم', 'en_name'=>'Glym'],
            ['region_id'=>1, 'ar_name'=>'زيزينيا', 'en_name'=>'Zizenia'],
            ['region_id'=>1, 'ar_name'=>'سابا باشا', 'en_name'=>'Saba Basha'],
            ['region_id'=>1, 'ar_name'=>'سان ستيفانو', 'en_name'=>'San Stefano'],
            ['region_id'=>1, 'ar_name'=>'ستانلي', 'en_name'=>'Stanley'],
            ['region_id'=>1, 'ar_name'=>'سيدي بشر', 'en_name'=>'Sidy Bishr'],
            ['region_id'=>1, 'ar_name'=>'شارع فؤاد', 'en_name'=>'Fouad Street'],
            ['region_id'=>1, 'ar_name'=>'فلمنج', 'en_name'=>'Fleming'],
            ['region_id'=>1, 'ar_name'=>'فيكتوريا', 'en_name'=>'Victoria'],
            ['region_id'=>1, 'ar_name'=>'كفر عبده', 'en_name'=>'Kafr Abdouh'],
            ['region_id'=>1, 'ar_name'=>'كليوباترا', 'en_name'=>'Kleopatra'],
            ['region_id'=>1, 'ar_name'=>'كينج ماريوط', 'en_name'=>'King Mariout'],
            ['region_id'=>1, 'ar_name'=>'محرم بيك', 'en_name'=>'Moharam Bek'],
            ['region_id'=>1, 'ar_name'=>'مصطفى كامل', 'en_name'=>'Moustafa Kamel'],
            ['region_id'=>1, 'ar_name'=>'ميامي', 'en_name'=>'Miamy'],
            // Aswan cities
            ['region_id'=>2, 'ar_name'=>'أسوان', 'en_name'=>'Aswan'],
            ['region_id'=>2, 'ar_name'=>'إدفو', 'en_name'=>'Edfu'],
            ['region_id'=>2, 'ar_name'=>'كوم إمبو', 'en_name'=>'Kom Ombo'],
            // Asyut cities
            ['region_id'=>3, 'ar_name'=>'ابنوب', 'en_name'=>'Abnub'],
            ['region_id'=>3, 'ar_name'=>'ديروط', 'en_name'=>'Dayrout'],
            ['region_id'=>3, 'ar_name'=>'منفلوط', 'en_name'=>'Manfalut'],
            ['region_id'=>3, 'ar_name'=>'مركز أسيوط', 'en_name'=>'Asyut City'],
            // Beheira cities
            ['region_id'=>4, 'ar_name'=>'دمنهور', 'en_name'=>'Damanhur'],
            ['region_id'=>4, 'ar_name'=>'كفر الدوار', 'en_name'=>'Kafr El Dawar'],
            // Beni Suef cities
            ['region_id'=>5, 'ar_name'=>'بني سويف الجديدة', 'en_name'=>'New Beni Suef'],
            ['region_id'=>5, 'ar_name'=>'الواسطى', 'en_name'=>'Al Wasta'],
            ['region_id'=>5, 'ar_name'=>'الفشن', 'en_name'=>'El Fashn'],
            ['region_id'=>5, 'ar_name'=>'ببا', 'en_name'=>'Biba'],
            ['region_id'=>5, 'ar_name'=>'ناصر', 'en_name'=>'Nasser'],
            // Cairo cities
            ['region_id'=>6, 'ar_name'=>'مصر الجديدة', 'en_name'=>'Heliopolis'],
            ['region_id'=>6, 'ar_name'=>'مدينة نصر', 'en_name'=>'Nasr City'],
            ['region_id'=>6, 'ar_name'=>'المعادي', 'en_name'=>'El-Maadi'],
            ['region_id'=>6, 'ar_name'=>'مصر الجديدة', 'en_name'=>'Heliopolis'],
            ['region_id'=>6, 'ar_name'=>'التجمع', 'en_name'=>'New Cairo'],
            ['region_id'=>6, 'ar_name'=>'حدائق القبة', 'en_name'=>'Hadayek El-Kobba'],
            ['region_id'=>6, 'ar_name'=>'مدينة العبور', 'en_name'=>'El-Obour City'],
            ['region_id'=>6, 'ar_name'=>'المنيل', 'en_name'=>'El-Manyal'],
            ['region_id'=>6, 'ar_name'=>'شبرا', 'en_name'=>'Shoubra'],
            ['region_id'=>6, 'ar_name'=>'وسط البلد', 'en_name'=>'West El-Balad'],
            ['region_id'=>6, 'ar_name'=>'الرحاب', 'en_name'=>'El-Rehab'],
            ['region_id'=>6, 'ar_name'=>'الزمالك', 'en_name'=>'El-Zamalek'],
            ['region_id'=>6, 'ar_name'=>'الزيتون', 'en_name'=>'El-Zaitoun'],
            ['region_id'=>6, 'ar_name'=>'السيدة زينب', 'en_name'=>'El-Sayeda Zainab'],
            ['region_id'=>6, 'ar_name'=>'الشروق', 'en_name'=>'El-Shorouk'],
            ['region_id'=>6, 'ar_name'=>'العاشر من رمضان', 'en_name'=>'10th of Ramadan'],
            ['region_id'=>6, 'ar_name'=>'العباسية', 'en_name'=>'Ain Shams'],
            ['region_id'=>6, 'ar_name'=>'القطامية', 'en_name'=>'El-Kattameya'],
            ['region_id'=>6, 'ar_name'=>'المرج', 'en_name'=>'El-Marg'],
            ['region_id'=>6, 'ar_name'=>'المطرية', 'en_name'=>'El-Matareya'],
            ['region_id'=>6, 'ar_name'=>'المقطم', 'en_name'=>'El-Mokattam'],
            ['region_id'=>6, 'ar_name'=>'بولاق', 'en_name'=>'Boulaq'],
            ['region_id'=>6, 'ar_name'=>'حدائق المعادي', 'en_name'=>'Hadayek El Maadi'],
            ['region_id'=>6, 'ar_name'=>'حدائق حلوان', 'en_name'=>'Hadayek Helwan'],
            ['region_id'=>6, 'ar_name'=>'حلوان', 'en_name'=>'Helwan'],
            ['region_id'=>6, 'ar_name'=>'دار السلام', 'en_name'=>'Dar El-Salam'],
            ['region_id'=>6, 'ar_name'=>'شبرا الخيمة', 'en_name'=>'houbra El-Kheima'],
            ['region_id'=>6, 'ar_name'=>'عين شمس', 'en_name'=>'Ain Shams'],
            ['region_id'=>6, 'ar_name'=>'مدينتي', 'en_name'=>'Madinaty'],
            ['region_id'=>6, 'ar_name'=>'مصر القديمة', 'en_name'=>'Masr El-Kadima'],
            // Dakahlia cities
            ['region_id'=>7, 'ar_name'=>'المنصورة', 'en_name'=>'El-Mansoura'],
            ['region_id'=>7, 'ar_name'=>'ميت غمر', 'en_name'=>'Mit Ghamr'],
            // Damietta cities
            ['region_id'=>8, 'ar_name'=>'مدينة دمياط', 'en_name'=>'Damietta City'],
            // Faiyum cities
            ['region_id'=>9, 'ar_name'=>'ابشواي', 'en_name'=>'Ibsheway'],
            ['region_id'=>9, 'ar_name'=>'مدينة الفيوم', 'en_name'=>'El-Fayoum city'],
            // Gharbia cities
            ['region_id'=>10, 'ar_name'=>'طنطا', 'en_name'=>'Tanta'],
            ['region_id'=>10, 'ar_name'=>'كفر الزيات', 'en_name'=>'Kafr El Zayat'],
            ['region_id'=>10, 'ar_name'=>'المحلة الكبرى', 'en_name'=>'Mahalla'],
            // Giza cities
            ['region_id'=>11, 'ar_name'=>'الدقي والمهندسين', 'en_name'=>'Dokki and Mohandessin'],
            ['region_id'=>11, 'ar_name'=>'6 اكتوبر', 'en_name'=>'6th of October'],
            ['region_id'=>11, 'ar_name'=>'الهرم', 'en_name'=>'El-Haram'],
            ['region_id'=>11, 'ar_name'=>'فيصل', 'en_name'=>'Faisal'],
            ['region_id'=>11, 'ar_name'=>'الشيخ زايد', 'en_name'=>'El-Sheikh Zayed'],
            ['region_id'=>11, 'ar_name'=>'حدائق الأهرام', 'en_name'=>'Hadayek El-Ahram'],
            ['region_id'=>11, 'ar_name'=>'العجوزة', 'en_name'=>'El-Agouza'],
            ['region_id'=>11, 'ar_name'=>'ميدان الجيزة', 'en_name'=>'El-Giza'],
            ['region_id'=>11, 'ar_name'=>'إمبابة', 'en_name'=>'Imbaba'],
            ['region_id'=>11, 'ar_name'=>'البدراشين', 'en_name'=>'El-Badrashin'],
            ['region_id'=>11, 'ar_name'=>'الحوامدية', 'en_name'=>'El-Hawamdeya'],
            ['region_id'=>11, 'ar_name'=>'العياط', 'en_name'=>'El-Ayyat'],
            // Ismailia cities
            ['region_id'=>12, 'ar_name'=>'مدينة الإسماعيلية', 'en_name'=>'El-Ismailia City'],
            // Kafr El Sheikh cities
            ['region_id'=>13, 'ar_name'=>'مركز كفر الشيخ', 'en_name'=>'Kafr El sheikh City'],
            // Luxor cities
            ['region_id'=>14, 'ar_name'=>'مدينة الأقصر', 'en_name'=>'Luxor City'],
            // Matruh cities
            ['region_id'=>15, 'ar_name'=>'مرسى مطروح', 'en_name'=>'Marsa Matrouh'],
            // Minya cities
            ['region_id'=>16, 'ar_name'=>'مركز المنيا', 'en_name'=>'El Minya City'],
            // Monufia cities
            ['region_id'=>17, 'ar_name'=>'شبين الكوم', 'en_name'=>'Shibin El-Kom'],
            ['region_id'=>17, 'ar_name'=>'منوف', 'en_name'=>'Menouf'],
            ['region_id'=>17, 'ar_name'=>'مدينة السادات', 'en_name'=>'Sadat City'],
            ['region_id'=>17, 'ar_name'=>'بركة السبع', 'en_name'=>'Birket El Sabea'],
            // New Valley cities
            ['region_id'=>18, 'ar_name'=>'الخارجة', 'en_name'=>'Kharga Oasis'],
            // North Sinai cities
            ['region_id'=>19, 'ar_name'=>'العريش', 'en_name'=>'Arish'],
            ['region_id'=>19, 'ar_name'=>'الشيخ زويد', 'en_name'=>'Sheikh Zuweid'],
            // Port Said cities
            ['region_id'=>20, 'ar_name'=>'مدينة بورسعيد', 'en_name'=>'Port Said City'],
            ['region_id'=>20, 'ar_name'=>'بورفؤاد', 'en_name'=>'Port Fouad'],
            // Qalyubia cities
            ['region_id'=>21, 'ar_name'=>'مركز بنها', 'en_name'=>'Banha'],
            ['region_id'=>21, 'ar_name'=>'قليوب', 'en_name'=>'Qalyoub'],
            // Qena cities
            ['region_id'=>22, 'ar_name'=>'مدينة قنا', 'en_name'=>'Qena'],
            ['region_id'=>22, 'ar_name'=>'نجع حمادي', 'en_name'=>'Nag Hammadi'],
            // Red Sea cities
            ['region_id'=>23, 'ar_name'=>'مدينة الغردقة', 'en_name'=>'Hurghada'],
            // Sharqia cities
            ['region_id'=>24, 'ar_name'=>'الزقازيق', 'en_name'=>'El-Zagazig'],
            ['region_id'=>24, 'ar_name'=>'منيا القمح', 'en_name'=>'Menya El-Kamh'],
            ['region_id'=>24, 'ar_name'=>'فاقوس', 'en_name'=>'Fakous'],
            // Sohag cities
            ['region_id'=>25, 'ar_name'=>'منيا سوهاج', 'en_name'=>'Sohag City'],
            // South Sinai cities
            ['region_id'=>26, 'ar_name'=>'شرم الشيخ', 'en_name'=>'Sharm El Sheikh'],
            ['region_id'=>26, 'ar_name'=>'دهب', 'en_name'=>'Dahab'],
            ['region_id'=>26, 'ar_name'=>'نويبع', 'en_name'=>'Nuweiba'],
            ['region_id'=>26, 'ar_name'=>'طابا', 'en_name'=>'Taba'],
            // Suez cities
            ['region_id'=>27, 'ar_name'=>'منيا السويس', 'en_name'=>'Suez City'],
        ];

        \Illuminate\Support\Facades\DB::table('cities')->insert($cities);
    }
}
