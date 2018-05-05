<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CosmeticClinicSpeciality extends Model
{
    public $timestamps = false;

    public function cosmeticClinics()
    {
        return $this->belongsToMany(CosmeticClinic::class, 'cosmetic_clinic_speciality');
    }
}
