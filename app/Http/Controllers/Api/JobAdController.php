<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\JobAdCollection;
use App\Http\Resources\JobAdResource;
use App\JobAd;
use App\JobAdCategory;
use App\PhoneNumber;
use App\User;
use App\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobAdController extends Controller
{
    public function index()
    {
        $jobAds = JobAd::with([
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
            ->paginate(9);

        return new JobAdCollection($jobAds);
    }


    public function show(JobAd $jobAd)
    {
        $jobAd->load([
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
        ]);

        return new JobAdResource($jobAd);
    }

    public function fav(JobAd $jobAd, $id)
    {
        try {

            $jobAd->favorites()->firstOrCreate(['user_id' => $id]);

            return response()->json([
                'message' => 'JobAd has been saved to favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function unfav(JobAd $jobAd, $id)
    {
        try {
            $jobAd->favorites()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'JobAd has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(JobAd $jobAd, Request $request)
    {
        View::new($jobAd, $request);
    }

    public function search(Request $request)
    {
        $jobAds = JobAd::fetch($request);

        if (count($jobAds)) {
            return new JobAdCollection($jobAds);
        } else {
            return response()->json([
                'message' => 'Nothing found'
            ], 200);
        }
    }

    public function store(Request $request)
    {
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
            'img' => 'required'
        ]);
        $job = new JobAd;
        $job->user_id = $request->userId;
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

        if($request->has('img')) {
            $job->appUploadImage($request);
        }
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
        return response()->json($job, 201);
    }

    public function destroy(User $user, JobAd $jobAd)
    {
        try {
            $job = $user->jobAds()->find($jobAd->id);
            if ($job) {
                $job->delete();
                return redirect()->back();
            } else {
                return redirect()->back()->withErrors(['Job not found']);
            }
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
}
