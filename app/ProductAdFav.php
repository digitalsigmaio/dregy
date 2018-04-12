<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAdFav extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productAd()
    {
        return $this->belongsTo(ProductAd::class);
    }
}
