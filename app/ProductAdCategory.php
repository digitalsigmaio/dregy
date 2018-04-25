<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAdCategory extends Model
{
    public $timestamps = false;

    public function productAds()
    {
        return $this->hasMany(ProductAd::class);
    }
}
