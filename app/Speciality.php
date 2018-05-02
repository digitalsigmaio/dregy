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
        return $this->belongsToMany(Hospital::class);
    }

    public function beautyCenters()
    {
        return $this->belongsToMany(CosmeticClinic::class);
    }

    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }

}
