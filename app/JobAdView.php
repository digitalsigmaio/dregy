<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAdView extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobAd()
    {
        return $this->belongsTo(JobAd::class);
    }
}
