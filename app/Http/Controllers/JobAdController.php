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
use App\User;
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
        $filters = collect([
            'regions' => $regions,
            'categories' => $categories,
            'empTypes' => $jobEmploymentTypes,
            'expLevels' => $jobExperienceLevels,
            'eduLevels' => $jobEducationLevels,
            'types' => $jobTypes
        ]);

        return view('jobs', compact(['filters']));
    }

    public function show(User $user, JobAd $jobAd){
        $category = $jobAd->category;
        $relatedJobs = $category->jobAds()->inrandomOrder()->take(9)->get();
        $relatedJobsChunks = $relatedJobs->chunk(3);
        return view('job', compact(['jobAd', 'relatedJobsChunks']));
    }
}
