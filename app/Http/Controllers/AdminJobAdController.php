<?php

namespace App\Http\Controllers;

use App\JobAd;
use Illuminate\Http\Request;
use App\JobAdCategory;
use App\JobEducationLevel;
use App\JobEmploymentType;
use App\JobExperienceLevel;
use App\JobType;
use App\PhoneNumber;
use App\Region;
use App\Http\Resources\JobAdResource;
use Illuminate\Support\Facades\Auth;
use App\Events\ReviewJob;


class AdminJobAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user_id = $id;
        $admin = Auth('admin')->user();
        $categories = JobAdCategory::all();
        $regions = Region::with('cities')->get();
        $experienceLevels = JobExperienceLevel::all();
        $educationLevels = JobEducationLevel::all();
        $employmentTypes = JobEmploymentType::all();

        return view('admin.ads.newJob', compact(['admin','categories', 'regions', 'experienceLevels', 'educationLevels', 'employmentTypes','user_id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required | min:3',
            'salary' => 'required | numeric',
            'description' => 'required | min:20',
            'jobTypeId' => 'required',
            'categoryId' => 'required',
            'experienceLevelId' => 'required',
            'educationLevelId' => 'required',
            'employmentTypeId' => 'required',
            'regionId' => 'required',
            'cityId' => 'required',
            'address' => 'required',
            'phone.*' => 'required | numeric',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $job = new JobAd;
        $job->user_id = $request->user_id;
        $job->admin_id = $request->admin_id;
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
        $job->approved = true;

        try {
            $job->uploadImage($request->img);
            $job->save();
            $phonesarray = $request->phones;
            if (count($phonesarray)) {
                    foreach ($phonesarray as $number) {
                        $phone = new PhoneNumber;
                        $phone->number = $number;
                        $job->phoneNumbers()->save($phone);
                    }
                }
            //session()->flash('success', 'Job has been added and waiting for review');
            return response()->json(['success'=> 'Job has been added and waiting for review' ], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => $e->getMessage()], 400);
            }
            
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobAd  $jobAd
     * @return \Illuminate\Http\Response
     */
    public function show(JobAd $jobAd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobAd  $jobAd
     * @return \Illuminate\Http\Response
     */
    public function edit(JobAd $jobAd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobAd  $jobAd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobAd $jobAd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobAd  $jobAd
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobAd $jobAd)
    {
        //
    }

    public function pendingJobs()
    {
        $admin = Auth('admin')->user();
        $jobs = JobAdResource::collection(JobAd::pending()->get());
        return view('admin.jobs.pending', compact(['jobs', 'admin']));
    }

    public function pendingJobsOnHold()
    {
        $admin = Auth('admin')->user();
        $jobs = JobAdResource::collection($admin->jobsOnHold);
        return view('admin.jobs.on-hold', compact(['jobs', 'admin']));
    }

    public function jobReview(JobAd $jobAd)
    {
        $adminId = Auth::guard('admin')->user()->id;
        broadcast(new ReviewJob($jobAd, $adminId));
    }
}
