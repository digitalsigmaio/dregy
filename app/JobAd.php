<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobAd extends Model
{
    public function category()
    {
        return $this->belongsTo(JobAdCategory::class);
    }

    public function views()
    {
        return $this->hasMany(JobAdView::class);
    }

    public function favs()
    {
        return $this->hasMany(JobAdFav::class);
    }

    public function review()
    {
        return $this->hasOne(JobAdminReview::class);
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

    public function phoneNumbers()
    {
        return $this->belongsToMany(PhoneNumber::class, 'job_ad_phone_number');
    }
}
