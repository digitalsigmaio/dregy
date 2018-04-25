<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    public $timestamps = false;

    public function phonable()
    {
        return $this->morphTo();
    }
}
