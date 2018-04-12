<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }

    public function beautyCenter()
    {
        return $this->belongsTo(BeautyCenter::class);
    }

    public function productAd()
    {
        return $this->belongsTo(ProductAd::class);
    }

    public function jobAd()
    {
        return $this->belongsTo(JobAd::class);
    }
}
