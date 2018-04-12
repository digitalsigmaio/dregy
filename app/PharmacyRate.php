<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyRate extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class);
    }
}
