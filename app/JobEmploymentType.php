<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobEmploymentType extends Model
{
    public $timestamps = false;

    public function jobAds()
    {
        return $this->hasMany(JobAd::class);
    }
}
