<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeautyCenterSpeciality extends Model
{
    protected $table = 'beauty_center_speciality';

    protected $fillable = [
        'beauty_center_id',
        'speciality_id'
    ];
}
