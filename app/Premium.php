<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    protected $fillable = ['admin_id', 'priority', 'expires_at'];
    public function premiumable()
    {
        return $this->morphTo();
    }
}
