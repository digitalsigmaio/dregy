<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobAdCollection;
use App\Http\Resources\JobAdResource;
use App\Http\Resources\ProductAdCollection;
use App\JobAd;
use App\JobAdCategory;
use App\JobEducationLevel;
use App\JobEmploymentType;
use App\JobExperienceLevel;
use App\JobType;
use App\PhoneNumber;
use App\Region;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function show(JobAd $jobAd, $slug){
        $relatedJobs = $jobAd->category->jobAds()->inrandomOrder()->take(9)->get();
        $relatedJobs = $relatedJobs->reject(function ($item) use ($jobAd) {
            return $item->id == $jobAd->id;
        });
        $relatedJobs = JobAdResource::collection($relatedJobs);
        $relatedJobsChunks = $relatedJobs->chunk(3);
        $relatedJobsChunks = json_encode($relatedJobsChunks);

        $jobAd = new JobAdResource($jobAd);
        $jobAd = json_encode($jobAd);

        return view('job', compact(['jobAd', 'relatedJobsChunks']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | min:3',
            'salary' => 'required',
            'description' => 'required | min:20',
            'jobTypeId' => 'required',
            'categoryId' => 'required',
            'experienceLevelId' => 'required',
            'educationLevelId' => 'required',
            'employmentTypeId' => 'required',
            'regionId' => 'required',
            'cityId' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $job = new JobAd;
        $job->user_id = Auth::user()->id;
        $job->title = $request->title;
        $job->slug = str_slug($request->title);
        $job->ref_id = 'job-'. str_random(6) . '-' . time();
        $job->salary = $request->salary;
        $job->description = $request->description;
        $job->job_type_id = $request->jobTypeId;
        $job->job_experience_level_id = $request->experienceLevelId;
        $job->job_education_level_id = $request->educationLevelId;
        $job->job_employment_type_id = $request->employmentTypeId;
        $job->job_ad_category_id = $request->categoryId;
        $job->region_id = $request->regionId;
        $job->city_id = $request->cityId;
        $job->address = $request->address;
        $job->expires_at = now()->addDays(30);
        try {
            $job->uploadImage($request);
            $job->save();
            if(count($request->phone) > 2) {
                for($i=0;$i<count($request->phone);$i++) {
                    if($i==2) {
                        break;
                    }
                    $phone = new PhoneNumber;
                    $phone->number = $phone[$i];
                    $job->phoneNumbers()->save($phone);
                }
            } else {
                foreach($request->phone as $number) {
                    $phone = new PhoneNumber;
                    $phone->number = $number;
                    $job->phoneNumbers()->save($phone);
                }
            }
            session()->flash('success', 'Job has been added and waiting for review');
            return redirect()->back();
        } catch (QueryException $e) {
            return $e->getMessage();
        }



    }
}
