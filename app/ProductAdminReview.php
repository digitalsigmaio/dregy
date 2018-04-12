<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAdminReview extends Model
{
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function productAd()
    {
        return $this->belongsTo(ProductAd::class);
    }

}
