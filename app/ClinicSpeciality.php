<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicSpeciality extends Model
{
    public $timestamps = false;

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class, 'clinic_speciality');
    }
}
