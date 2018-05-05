<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalSpeciality extends Model
{
    public $timestamps = false;

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_speciality');
    }
}
