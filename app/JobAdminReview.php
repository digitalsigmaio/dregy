<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAdminReview extends Model
{
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function jobAd()
    {
        return $this->belongsTo(JobAd::class);
    }
}
