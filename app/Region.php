<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function hospitals()
    {
        return $this->hasMany(Hospital::class);
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }

    public function pharmacies()
    {
        return $this->hasMany(Pharmacy::class);
    }

    public function beautyCenters()
    {
        return $this->hasMany(CosmeticClinic::class);
    }
}
