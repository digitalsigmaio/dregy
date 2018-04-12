<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    public function hospital()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_phone_number');
    }

    public function clinic()
    {
        return $this->belongsToMany(Clinic::class, 'clinic_phone_number');
    }

    public function pharmacy()
    {
        return $this->belongsToMany(Pharmacy::class, 'pharmacy_phone_number');
    }

    public function beautyCenter()
    {
        return $this->belongsToMany(BeautyCenter::class, 'beauty_center_phone_number');
    }

    public function productAd()
    {
        return $this->belongsToMany(ProductAd::class, 'product_ad_phone_number');
    }

    public function jobAd()
    {
        return $this->belongsToMany(JobAd::class, 'job_ad_phone_number');
    }
}
