<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'ar_name',
        'en_name'
    ];

    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_speciality');
    }

    public function cosmicClinics()
    {
        return $this->belongsToMany(CosmeticClinic::class, 'cosmic_clinic_speciality');
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class, 'clinic_speciality');
    }

}
