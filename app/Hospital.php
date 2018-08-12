<?php

namespace App;

use App\Traits\CollectionPagination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Request;

class Hospital extends Model
{
    use SoftDeletes, CollectionPagination;


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
        return $this->morphOne(Favorite::class, 'favourable')->selectRaw('COUNT(id) as count, favourable_type as type, favourable_id')->groupBy('favourable_id', 'favourable_type');
    }

    public function views()
    {
        return $this->morphOne(View::class, 'viewable')->selectRaw('COUNT(id) as count, viewable_type as type, viewable_id')->groupBy('viewable_id', 'viewable_type');
    }

    public function rates()
    {
        return $this->morphOne(Rate::class, 'rateable')->selectRaw('ROUND((SUM(rate) / COUNT(rate)), 1) as rating, COUNT(rate) as count, rateable_id')->groupBy('rateable_id');
    }

    public function rawRates()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    public function specialities()
    {
        return $this->belongsToMany(HospitalSpeciality::class, 'hospital_speciality');
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

    public function getFeaturedAttribute()
    {
        return $this->premium ? true : false;
    }

    public static function fetch(Request $request)
    {
        $region = $request->region;
        $city = $request->city;
        $speciality = $request->speciality;
        $rating = $request->rate;

        $keyword = trim($request->keyword);
        $orderBy = $request->orderBy;
        $sort = $request->sort;

        $data = self::with(['region',
            'city',
            'specialities',
            'rates',
            'favorites',
            'phoneNumbers',
            'views',
            'premium'
        ])
            ->when($region, function ($query) use ($region) {
                return $query->where('region_id', $region);
            })
            ->when($city, function ($query) use ($city) {
                return $query->where('city_id', $city);
            })
            ->when($rating, function ($query) use ($rating) {
                return $query->whereHas('rates', function ($query) use ($rating) {
                    $query->select('rateable_id')->havingRaw("ROUND(SUM(rate) / COUNT(rateable_id), 1) >= $rating")->groupBy('rateable_id');
                });
            })
            ->when($speciality, function ($query) use ($speciality) {
                return $query->whereHas('specialities', function ($query) use ($speciality) {
                    $query->where('hospital_speciality_id', $speciality);
                });
            })
            ->get();

        if($keyword) {
            $keyword = strtolower($keyword);
            $data = $data->filter(function ($record) use ($keyword) {
                if(
                    strpos(strtolower($record->ar_name), $keyword) !== false ||
                    strpos(strtolower($record->en_name), $keyword) !== false
                ) {
                    return true;
                }
            });
        }

        if($orderBy) {
            if($sort == 'asc') {
                $sorted = $data->sortBy('rates.rating');
            } else {
                $sorted = $data->sortByDesc('rates.rating');
            }
        } else {
            $sorted = $data->sortBy('premium.priority');
        }

        return self::paginate($sorted, 12, null, ['path'=> $request->url(), 'query' => $request->query()]);
    }

}
