<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeautyCenter extends Model
{
    use SoftDeletes;

    protected $casts = [
        'premium' => 'boolean',
    ];


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
        return $this->hasMany(BeautyCenterFav::class);
    }

    public function views()
    {
        return $this->hasMany(BeautyCenterView::class);
    }

    public function rates()
    {
        return $this->hasMany(BeautyCenterRate::class);
    }

    public function phoneNumbers()
    {
        return $this->belongsToMany(PhoneNumber::class, 'beauty_center_phone_number');
    }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }

    public function getRateAttribute()
    {
        $countOfRates = $this->rates->count();
        $sumOfRates = $this->rates()->sum('rate');

        return round(($sumOfRates / $countOfRates), 1);
    }
}
