<?php

namespace App;

use App\Traits\CollectionPagination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ImageUploader;

class Pharmacy extends Model
{
    use SoftDeletes, CollectionPagination, ImageUploader;

    protected $casts = [
        'delivery' => 'boolean',
        'full_time' => 'boolean'
    ];

    private $imagePath = 'img/pharmacies';

    protected $fillable = [
        'admin_id',
        'ar_name',
        'en_name',
        'region_id',
        'city_id',
        'ar_address',
        'en_address',
        'ar_note',
        'en_note',
        'ar_work_times' ,
        'en_work_times',
        'website',
        'email',
        'slug',
        'full_time'
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

    public static function fetch($request)
    {
        $region = $request->region;
        $city = $request->city;
        $fullDay = filter_var($request->fullDay, FILTER_VALIDATE_BOOLEAN);
        $delivery = filter_var($request->delivery, FILTER_VALIDATE_BOOLEAN);
        $keyword = trim($request->keyword);
        $rating = $request->rate;
        $orderBy = $request->orderBy;
        $sort = $request->sort;

        $data = self::with(['region',
            'city',
            'rates',
            'views',
            'favorites',
            'phoneNumbers',
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
            ->when($fullDay, function ($query) {
                return $query->where('full_time', 1);
            })
            ->when($delivery, function ($query) {
                return $query->where('delivery', 1);
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

        return self::paginate($sorted, 12, null, ['path'=> $request->url(), 'query' => $request->query()]);
    }
}
