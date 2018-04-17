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

    public function views()
    {
        return $this->hasMany(ProductAdView::class);
    }

    public function favs()
    {
        return $this->hasMany(ProductAdFav::class);
    }

    public function review()
    {
        return $this->hasOne(ProductAdminReview::class);
    }

    public function phoneNumbers()
    {
        return $this->belongsToMany(PhoneNumber::class, 'product_ad_phone_number');
    }

    public function getViewsAttribute()
    {
        return $this->views()->count();
    }
}
