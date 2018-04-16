<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeautyCenterRate extends Model
{
    protected $fillable = [
        'user_id',
        'rate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beautyCenter()
    {
        return $this->belongsTo(BeautyCenter::class);
    }
}
