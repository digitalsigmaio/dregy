<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobExperienceLevel extends Model
{
    public function jobAds()
    {
        return $this->hasMany(JobAd::class);
    }
}
