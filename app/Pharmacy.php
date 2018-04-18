<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
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
        return $this->hasMany(PharmacyFav::class);
    }

    public function views()
    {
        return $this->hasMany(PharmacyView::class);
    }

    public function rates()
    {
        return $this->hasMany(PharmacyRate::class);
    }

    public function phoneNumbers()
    {
        return $this->belongsToMany(PhoneNumber::class, 'pharmacy_phone_number');
    }

    public function getRateAttribute()
    {
        if ($this->rates()->exists()) {
            $countOfRates = $this->rates->count();
            $sumOfRates = $this->rates()->sum('rate');

            return round(($sumOfRates / $countOfRates), 1);
        } else {
            return null;
        }
    }

    public function getViewsAttribute()
    {
        return $this->views()->count();
    }


}
