<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\JobAdCategory;
use App\JobEducationLevel;
use App\JobEmploymentType;
use App\JobExperienceLevel;
use App\JobType;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobFilterController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $categories = JobAdCategory::all();
        $jobEmploymentTypes = JobEmploymentType::all();
        $jobExperienceLevels = JobExperienceLevel::all();
        $jobEducationLevels = JobEducationLevel::all();
        $jobTypes = JobType::all();



        return response()->json([
            'data' => [
                'regions' => $regions,
                'categories' => $categories,
                'empTypes' => $jobEmploymentTypes,
                'expLevels' => $jobExperienceLevels,
                'eduLevels' => $jobEducationLevels,
                'types' => $jobTypes
            ]
        ], 200);

    }
}
