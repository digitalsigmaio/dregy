<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CosmeticClinicSpeciality extends Model
{
    protected $table = 'cosmetic_clinic_speciality';
    public $timestamps = false;

    protected $fillable = [
        'cosmetic_clinic_id',
        'speciality_id'
    ];
}
