<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class);
    }

    public function beautyCenters()
    {
        return $this->belongsToMany(BeautyCenter::class);
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }

}
