<?php

namespace App;

use App\Traits\CollectionPagination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->morphMany(Favorite::class, 'favourable');
    }

    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }

    public function rates()
    {
        return $this->morphOne(Rate::class, 'rateable')->selectRaw('ROUND((SUM(rate) / COUNT(rate)), 1) as rating, COUNT(rate) as count, rateable_id')->groupBy('rateable_id');
    }

    public function specialities()
    {
        return $this->hasMany(HospitalSpeciality::class);
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function fetch($request)
    {
        $region = $request->region;
        $city = $request->city;
        $speciality = $request->speciality;
        $keyword = trim($request->keyword);
        $rating = $request->rate;
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
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('ar_name', 'like',  "%$keyword%")
                    ->orWhere('en_name', 'like', "%$keyword%")
                    ->orWhere('ar_address', 'like', "%$keyword%")
                    ->orWhere('en_address', 'like', "%$keyword%");
            })
            ->when($rating, function ($query) use ($rating) {
                return $query->whereHas('rates', function ($query) use ($rating) {
                    $query->havingRaw("ROUND(SUM(rate) / COUNT(rateable_id)) = $rating")->groupBy('rateable_id');
                });
            })
            ->when($speciality, function ($query) use ($speciality) {
                return $query->whereHas('specialities', function ($query) use ($speciality) {
                    $query->where('id', $speciality);
                });
            })
            ->get();


        if($orderBy) {
            if($sort == 'asc') {
                if ($orderBy == 'rate') {
                    $sorted = $data->sortBy('rates.rating');
                } else {
                    $sorted = $data->sortBy('updated_at');
                }
            } else {
                if ($orderBy == 'rate') {
                    $sorted = $data->sortByDesc('rates.rating');
                } else {
                    $sorted = $data->sortByDesc('updated_at');
                }
            }
        } else {
            $sorted = $data->sortBy('premium.priority');
        }
        return self::paginate($sorted, 10, null, ['path'=> $request->url(), 'query' => $request->query()]);
    }

}
