<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'user_agent',
        'user_ip'
    ];

    public function viewable()
    {
        return $this->morphTo();
    }
}
