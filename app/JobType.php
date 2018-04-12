<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    public function jobAds()
    {
        return $this->hasMany(JobAd::class);
    }
}
