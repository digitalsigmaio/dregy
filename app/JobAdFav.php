<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAdFav extends Model
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
