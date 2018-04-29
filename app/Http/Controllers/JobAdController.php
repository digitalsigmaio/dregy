<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobAdCollection;
use App\Http\Resources\ProductAdCollection;
use App\JobAd;
use App\JobAdCategory;
use App\JobEducationLevel;
use App\JobEmploymentType;
use App\JobExperienceLevel;
use App\JobType;
use App\Region;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class JobAdController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $categories = JobAdCategory::all();
        $jobEmploymentTypes = JobEmploymentType::all();
        $jobExperienceLevels = JobExperienceLevel::all();
        $jobEducationLevels = JobEducationLevel::all();
        $jobTypes = JobType::all();
        $filters = [
            'regions' => $regions,
            'categories' => $categories,
            'empTypes' => $jobEmploymentTypes,
            'expLevels' => $jobExperienceLevels,
            'eduLevels' => $jobEducationLevels,
            'types' => $jobTypes
        ];
        $filtersJson = json_encode($filters);

        return view('jobs', compact(['filtersJson']));
    }
}
