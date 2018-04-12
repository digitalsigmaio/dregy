<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function favs()
    {
        return $this->hasMany(ClinicFav::class);
    }

    public function views()
    {
        return $this->hasMany(ClinicView::class);
    }

    public function rates()
    {
        return $this->hasMany(ClinicRate::class);
    }

    public function phoneNumbers()
    {
        return $this->belongsToMany(PhoneNumber::class, 'clinic_phone_number');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }
}
