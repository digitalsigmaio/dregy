<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CollectionPagination;

class JobAd extends Model
{
    use SoftDeletes, CollectionPagination;

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
        return $this->belongsTo(JobExperienceLevel::class, 'job_experience_level_id');
    }

    public function employmentType()
    {
        return $this->belongsTo(JobEmploymentType::class, 'job_employment_type_id');
    }

    public function type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function educationLevel()
    {
        return $this->belongsTo(JobEducationLevel::class, 'job_education_level_id');
    }


    public function getViewsAttribute()
    {
        return $this->views()->count();
    }

    public static function fetch($request)
    {
        $region = $request->region;
        $city = $request->city;
        $keyword = trim($request->keyword);
        $category = $request->category;
        $experienceLevel = $request->experienceLevel;
        $employmentType = $request->employmenType;
        $type = $request->type;
        $educationLevel = $request->educationLevel;
        $orderBy = $request->orderBy;

        $data = self::with([
            'region',
            'city',
            'favorites',
            'phoneNumbers',
            'category',
            'experienceLevel',
            'employmentType',
            'type',
            'educationLevel',
            'views',
            'premium'
        ])
            ->when($region != '', function ($query) use ($region) {
                return $query->where('region_id', $region);
            })
            ->when($city != '', function ($query) use ($city) {
                return $query->where('city_id', $city);
            })
            ->when($keyword != '', function ($query) use ($keyword) {
                return $query->where('title', 'like',  "%$keyword%")
                    ->orWhere('description', 'like', "%$keyword%");
            })
            ->when($category != '', function ($query) use ($category) {
                return $query->where('category_id', $category);
            })
            ->when($experienceLevel != '', function ($query) use ($experienceLevel) {
                return $query->where('job_experience_level_id', $experienceLevel);
            })
            ->when($employmentType != '', function ($query) use ($employmentType) {
                return $query->where('job_employment_type_id', $employmentType);
            })
            ->when($type != '', function ($query) use ($type) {
                return $query->where('job_type_id', $type);
            })
            ->when($educationLevel != '', function ($query) use ($educationLevel) {
                return $query->where('job_education_level_id', $educationLevel);
            })
            ->get();
        if($orderBy != null) {
            $data = $data->sortByDesc($orderBy);
            $data = self::paginate($data, 9);
        }

        return $data;
    }


}
