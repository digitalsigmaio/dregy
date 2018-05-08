<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CollectionPagination;
use Zend\Diactoros\Request;

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

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(JobAdCategory::class, 'job_ad_category_id');
    }

    public function favorites()
    {
        return $this->morphOne(Favorite::class, 'favourable')->selectRaw('COUNT(id) as count, favourable_type as type, favourable_id')->groupBy('favourable_id', 'favourable_type');
    }

    public function views()
    {
        return $this->morphOne(View::class, 'viewable')->selectRaw('COUNT(id) as count, viewable_type as type, viewable_id')->groupBy('viewable_id', 'viewable_type');
    }

    public function phoneNumbers()
    {
        return $this->morphMany(PhoneNumber::class, 'phonable');
    }

    public function premium()
    {
        return $this->morphOne(Premium::class, 'premiumable');
    }

    public function offer()
    {
        return $this->morphOne(Offer::class, 'offerable');
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

    public function getFeaturedAttribute()
    {
        return $this->premium->count() ? true : false;
    }

    public static function fetch($request)
    {
        $region = $request->region;
        $city = $request->city;
        $keyword = trim($request->keyword);
        $category = $request->category;
        $experienceLevel = $request->experienceLevel;
        $employmentType = $request->employmentType;
        $type = $request->type;
        $educationLevel = $request->educationLevel;
        $orderBy = $request->orderBy;
        $sort = $request->sort;

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
            ->when($region, function ($query) use ($region) {
                return $query->where('region_id', $region);
            })
            ->when($city, function ($query) use ($city) {
                return $query->where('city_id', $city);
            })
            ->when($category, function ($query) use ($category) {
                return $query->where('job_ad_category_id', $category);
            })
            ->when($experienceLevel, function ($query) use ($experienceLevel) {
                return $query->where('job_experience_level_id', $experienceLevel);
            })
            ->when($employmentType, function ($query) use ($employmentType) {
                return $query->where('job_employment_type_id', $employmentType);
            })
            ->when($type, function ($query) use ($type) {
                return $query->where('job_type_id', $type);
            })
            ->when($educationLevel, function ($query) use ($educationLevel) {
                return $query->where('job_education_level_id', $educationLevel);
            })->when($orderBy && $orderBy == 'salary', function ($query) use ($sort){
                return $query->orderByRaw("salary - length(salary) $sort");
            })
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('title', 'like',  "%$keyword%")
                    ->orWhere('description', 'like', "%$keyword%");
            })
            ->when($orderBy && $orderBy != 'salary', function ($query) use ($orderBy, $sort) {
                return $query->orderBy($orderBy, $sort);
            }, function($query) {
                return $query->orderBy('updated_at', 'DESC');
            })
            ->get();

        if($orderBy) {
            $sorted = $data;
        } else {
            $sorted = $data->sortBy('premium.priority');
        }
        return self::paginate($sorted, 9, null, ['path'=> $request->url(), 'query' => $request->query()]);
    }


}
