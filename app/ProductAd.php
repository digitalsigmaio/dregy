<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAd extends Model
{
    use SoftDeletes;

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
}
