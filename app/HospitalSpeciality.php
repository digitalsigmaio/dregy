<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalSpeciality extends Model
{
    protected $table = 'hospital_speciality';

    protected $fillable = [
        'hospital_id',
        'speciality_id'
    ];
}
