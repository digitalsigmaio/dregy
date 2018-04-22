<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicSpeciality extends Model
{
    protected $table = 'clinic_speciality';
    public $timestamps = false;

    protected $fillable = [
        'clinic_id',
        'speciality_id'
    ];
}
