<?php

namespace App;

use App\Traits\AppImageUploader;
use App\Traits\CollectionPagination;
use App\Traits\ImageUploader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAd extends Model
{
    use SoftDeletes, CollectionPagination, ImageUploader, AppImageUploader;

    private $imagePath = 'img/products';

    protected $appends = [
        'evaluation'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductAdCategory::class, 'product_ad_category_id');
    }

    public function favorites()
    {
        return $this->morphOne(Favorite::class, 'favourable')->selectRaw('COUNT(id) as count, favourable_type as type, favourable_id')->groupBy('favourable_id', 'favourable_type');
    }

    public function views()
    {
        return $this->morphOne(View::class, 'viewable')->selectRaw('COUNT(id) as count, viewable_type as type, viewable_id')->groupBy('viewable_id', 'viewable_type');
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

    public function scopePending($query)
    {
        return $query->where('approved', null)->orderBy('created_at', 'asc');
    }

    public function getFeaturedAttribute()
    {
        return $this->premium ? true : false;
    }

    public function getEvaluationAttribute()
    {
        $val = $this->approved;
        switch (true) {
            case ($val === null):
                return __('words.pending');
                break;
            case ($val === 0):
                return __('words.rejected');
                break;
            case ($val === 1):
                return __('words.approved');
                break;
            default:
                return null;
                break;
        }
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
            'user',
            'favorites',
            'phoneNumbers',
            'category',
            'views',
            'premium'
        ])
            ->whereApproved(1)
            ->when($region, function ($query) use ($region) {
                return $query->where('region_id', $region);
            })
            ->when($city, function ($query) use ($city) {
                return $query->where('city_id', $city);
            })
            ->when($status, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($category, function ($query) use ($category) {
                return $query->where('product_ad_category_id', $category);
            })
            ->when($orderBy && $orderBy == 'price', function ($query) use ($sort){
                return $query->orderByRaw("price - length(price) $sort");
            })
            ->when($orderBy && $orderBy != 'price', function ($query) use ($orderBy, $sort) {
                return $query->orderBy($orderBy, $sort);
            }, function($query) {
                return $query->orderBy('updated_at', 'DESC');
            })
            ->get();

        if($keyword) {
            $keyword = strtolower($keyword);
            $data = $data->filter(function ($record) use ($keyword) {

                if(
                    strpos(strtolower($record->title), $keyword) !== false ||
                    strpos(strtolower($record->description), $keyword) !== false
                ) {
                    return true;
                }

            });
        }

        if($orderBy) {
            $sorted = $data;
        } else {
            $sorted = $data->sortBy('premium.priority');
        }
        return self::paginate($sorted, 12, null, ['path'=> $request->url(), 'query' => $request->query()]);
    }
}
