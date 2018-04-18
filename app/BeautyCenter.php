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

    public static function fetch($request)
    {
        $region = $request->region;
        $city = $request->city;
        $speciality = $request->speciality;
        $keyword = trim($request->keyword);
        $rate = $request->rate;

        $data = self::with(['region', 'city', 'specialities', 'rates', 'favs', 'phoneNumbers', 'views'])
            ->when($region != '', function ($query) use ($region) {
                return $query->where('region_id', $region);
            })
            ->when($city != '', function ($query) use ($city) {
                return $query->where('city_id', $city);
            })
            ->when($keyword != '', function ($query) use ($keyword) {
                return $query->where('ar_name', 'like',  "%$keyword%")
                    ->orWhere('en_name', 'like', "%$keyword%")
                    ->orWhere('ar_address', 'like', "%$keyword%")
                    ->orWhere('en_address', 'like', "%$keyword%");
            })
            ->when($rate != '', function ($query) use ($rate) {
                return $query->whereHas('rates', function ($query) use ($rate) {
                    $query->havingRaw('ROUND(SUM(rate) / COUNT(id), 1) >= ' . $rate);
                });
            })
            ->when($speciality != '', function ($query) use ($speciality) {
                return $query->whereHas('specialities', function ($query) use ($speciality) {
                    $query->where('specialities.id', $speciality);
                });
            })
            ->orderBy('premium', 'DESC')
            ->paginate(20);

        return $data;
    }


}
