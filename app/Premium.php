<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    public function premiumable()
    {
        return $this->morphTo();
    }
}
