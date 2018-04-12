<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
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
        return $this->hasMany(HospitalFav::class);
    }

    public function views()
    {
        return $this->hasMany(HospitalView::class);
    }

    public function rates()
    {
        return $this->hasMany(HospitalRate::class);
    }

    public function phoneNumbers()
    {
        return $this->belongsToMany(PhoneNumber::class, 'hospital_phone_number');
    }

    public function specialities()
    {
        return $this->belongsTo(Speciality::class);
    }


}
