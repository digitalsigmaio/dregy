<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAdCategory extends Model
{
    public function jobAds()
    {
        return $this->hasMany(JobAd::class);
    }
}
