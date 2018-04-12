<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAd extends Model
{
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
}
