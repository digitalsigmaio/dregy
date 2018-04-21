<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobAd extends Model
{
    use SoftDeletes;

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function category()
    {
        return $this->belongsTo(JobAdCategory::class);
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favourable');
    }

    public function views()
    {
        return $this->morphMany(View::class, 'viewable');
    }

    public function phoneNumbers()
    {
        return $this->morphMany(PhoneNumber::class, 'phonable');
    }

    public function premium()
    {
        return $this->morphOne(Premium::class, 'premiumable');
    }

    public function experienceLevel()
    {
        return $this->belongsTo(JobExperienceLevel::class);
    }

    public function employmentType()
    {
        return $this->belongsTo(JobEmploymentType::class);
    }

    public function type()
    {
        return $this->belongsTo(JobType::class);
    }

    public function educationLevel()
    {
        return $this->belongsTo(JobEducationLevel::class);
    }


    public function getViewsAttribute()
    {
        return $this->views()->count();
    }

}
