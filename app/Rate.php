<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'rate'
    ];

    public function rateable()
    {
        return $this->morphTo();
    }
}
