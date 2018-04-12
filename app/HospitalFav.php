<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalFav extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}
