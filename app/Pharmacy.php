<?php

namespace App;

use App\Traits\CollectionPagination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmacy extends Model
{
    use SoftDeletes, CollectionPagination;

    protected $casts = [
        'delivery' => 'boolean',
        'full_time' => 'boolean'
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

    public function totalRate()
    {
        return $this->morphOne(Rate::class, 'rateable')->selectRaw('ROUND((SUM(rate) / COUNT(rate)), 1) as total_rate');
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


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function fetch($request)
    {
        $region = $request->region;
        $city = $request->city;
        $fullDay = $request->fullDay;
        $delivery = $request->delivery;
        $keyword = trim($request->keyword);
        $rate = $request->rate;
        $orderBy = $request->orderBy;
        $sort = $request->sort;

        $data = self::with(['region',
            'city',
            'rates',
            'favorites',
            'phoneNumbers',
            'views',
            'premium'
        ])
            ->when($region, function ($query) use ($region) {
                return $query->where('region_id', $region);
            })
            ->when($city != '', function ($query) use ($city) {
                return $query->where('city_id', $city);
            })
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('ar_name', 'like',  "%$keyword%")
                    ->orWhere('en_name', 'like', "%$keyword%")
                    ->orWhere('ar_address', 'like', "%$keyword%")
                    ->orWhere('en_address', 'like', "%$keyword%");
            })
            ->when($rate, function ($query) use ($rate) {
                return $query->whereHas('rates', function ($query) use ($rate) {
                    $query->havingRaw('ROUND(SUM(rate) / COUNT(id)) = ' . $rate);
                });
            })
            ->when($fullDay, function ($query){
                return $query->where('ar_work_times', 'like',  "%24%")
                    ->orWhere('en_work_times', 'like', "%24%");
            })
            ->when($delivery, function ($query){
                return $query->where('ar_note', 'like',  "%توصيل%")
                    ->orWhere('en_note', 'like', "%delivery%");
            })
            ->when($orderBy && $orderBy != 'rate', function ($query) use ($orderBy, $sort) {

                return $query->orderBy($orderBy, $sort != '' ? $sort : 'DESC');

            })
            ->orderBy('pharmacies.updated_at', 'DESC')
            ->get();
        if ($orderBy == 'rate') {
            if ($sort == 'asc') {
                $sorted = $data->sortBy('totalRate.total_rate');
            } else {
                $sorted = $data->sortByDesc('totalRate.total_rate');
            }
        } elseif($orderBy) {
            $sorted = $data;
        } else {
            $sorted = $data->sortBy('premium.priority');
        }
        return self::paginate($sorted, 10, null, ['path'=> $request->url(), 'query' => $request->query()]);
    }
}
