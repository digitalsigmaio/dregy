<?php

use Illuminate\Database\Seeder;

class ClinicSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            ["ar_name"=> "الحساسية والمناعة", "en_name" => "Allergy and Immunology (Sensitivity and Immunity)"],
            ["ar_name"=> "الذكورة والعقم عند الذكور", "en_name" => "Andrology and Male Infertility"],
            ["ar_name"=> "السمعيات", "en_name" => "Audiology"],
            ["ar_name"=> "أمراض القلب وجراحة الصدر", "en_name" => "Cardiology and Thoracic Surgery (Heart & Chest)"],
            ["ar_name"=> "الصدر والجهاز التنفسي", "en_name" => "Chest and Respiratory"],
            ["ar_name"=> "مرض السكري والغدد الصماء", "en_name" => "Diabetes and Endocrinology"],
            ["ar_name"=> "الأشعة التشخيصية", "en_name" => "Diagnostic Radiology (Scan Centers)"],
            ["ar_name"=> "أخصائي التغذية و تخسيس", "en_name" => "Dietitian and Nutrition"],
            ["ar_name"=> "طب المسنين", "en_name" => "Elders (Old People Health)"],
            ["ar_name"=> "الجهاز الهضمي والتنظير", "en_name" => "Gastroenterology and Endoscopy"],
            ["ar_name"=> "الممارسة العامة", "en_name" => "General Practice"],
            ["ar_name"=> "الجراحة العامة", "en_name" => "General Surgery"],
            ["ar_name"=> "امراض دم", "en_name" => "Hematology"],
            ["ar_name"=> "طب الكبد", "en_name" => "Hepatology (Liver Doctor)"],
            ["ar_name"=> "الطب الباطني", "en_name" => "Internal Medicine"],
            ["ar_name"=> "ذكورة وعقم", "en_name" => "IVF and Infertility"],
            ["ar_name"=> "طب الكلي", "en_name" => "Nephrology"],
            ["ar_name"=> "جراحة الاعصاب", "en_name" => "Neurosurgery (Brain & Nerves Surgery)"],
            ["ar_name"=> "السمنة وجراحة المناظير", "en_name" => "Obesity and Laparoscopic Surgery"],
            ["ar_name"=> "الأورام", "en_name" => "Oncology (Tumor)"],
            ["ar_name"=> "جراحة الأورام", "en_name" => "Oncology Surgery (Tumor Surgery)"],
            ["ar_name"=> "طب العيون", "en_name" => "Ophthalmology (Eyes)"],
            ["ar_name"=> "العظام", "en_name" => "Osteopathy (Osteopathic Medicine)"],
            ["ar_name"=> "إدارة الألم", "en_name" => "Pain Management"],
            ["ar_name"=> "جراحة الأطفال", "en_name" => "Pediatric Surgery"],
            ["ar_name"=> "نطق وتخاطب", "en_name" => "Phoniatrics (Speech)"],
            ["ar_name"=> "العلاج الطبيعي وإصابات الرياضة", "en_name" => "Physiotherapy and Sport Injuries"],
            ["ar_name"=> "جراحة تجميلية", "en_name" => "Plastic Surgery"],
            ["ar_name"=> "الروماتيزم", "en_name" => "Rheumatology"],
            ["ar_name"=> "جراحة العمود الفقري", "en_name" => "Spinal Surgery"],
            ["ar_name"=> "أمراض المسالك البولية", "en_name" => "Urology (Urinary System)"],
            ["ar_name"=> "جراحة اوعية دموية", "en_name" => "Vascular Surgery (Arteries and Vein Surgery)"]
        ];

        \Illuminate\Support\Facades\DB::table('clinic_specialities')->insert($specialities);
    }
}
