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

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favourable');
    }

    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    public function phoneNumbers()
    {
        return $this->morphMany(PhoneNumber::class, 'phonable');
    }

    public function premium()
    {
        return $this->morphOne(Premium::class, 'premiumable');
    }

    public function offer()
    {
        return $this->morphOne(Offer::class, 'offerable');
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
