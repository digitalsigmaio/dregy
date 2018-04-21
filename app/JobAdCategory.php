<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAdCategory extends Model
{
    public $timestamps = false;

    public function jobAds()
    {
        return $this->hasMany(JobAd::class);
    }
}
