<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicRate extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
