<?php

namespace App;

use App\Traits\CollectionPagination;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAd extends Model
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

    public function category()
    {
        return $this->belongsTo(ProductAdCategory::class);
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favourable');
    }

    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
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

    public function getViewsAttribute()
    {
        return $this->views()->count();
    }

    public static function fetch($request)
    {
        $region = $request->region;
        $city = $request->city;
        $keyword = trim($request->keyword);
        $category = $request->category;
        $status = $request->status;
        $orderBy = $request->orderBy;
        $sort = $request->sort;

        $data = self::with([
            'region',
            'city',
            'favorites',
            'phoneNumbers',
            'category',
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
                return $query->where('title', 'like',  "%$keyword%")
                    ->orWhere('description', 'like', "%$keyword%");
            })->
            when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($category, function ($query) use ($category) {
                return $query->where('product_ad_category_id', $category);
            })
            ->when($orderBy, function ($query) use ($orderBy, $sort) {
                if ($orderBy == 'price'){
                    return $query->orderByRaw("length($orderBy) $sort, $orderBy $sort");
                } else {
                    return $query->orderBy($orderBy, $sort != '' ? $sort : 'DESC');
                }
            })
            ->orderBy('product_ads.updated_at', 'DESC')
            ->get();

        if ($orderBy){
            $sorted = $data;
        } else {
            $sorted = $data->sortBy('premium.priority');
        }

        return self::paginate($sorted, 12, null, ['path'=> $request->url(), 'query' => $request->query()]);
    }
}
