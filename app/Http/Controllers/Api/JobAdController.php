<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\JobAdCollection;
use App\Http\Resources\JobAdResource;
use App\JobAd;
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
            'favs',
            'phoneNumbers',
            'category',
            'experienceLevel',
            'employmentType',
            'type',
            'educationLevel',
            'review',
            'views'
        ])
            ->paginate(10);

        return new JobAdCollection($jobAds);
    }

    public function show(JobAd $jobAd)
    {
        $jobAd->load([
            'region',
            'city',
            'favs',
            'phoneNumbers',
            'category',
            'experienceLevel',
            'employmentType',
            'type',
            'educationLevel',
            'review',
            'views'
        ]);

        return new JobAdResource($jobAd);
    }

    public function fav(JobAd $jobAd, $id)
    {
        try {

            $jobAd->favs()->firstOrCreate(['user_id' => $id]);

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

            $jobAd->favs()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'JobAd has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(JobAd $jobAd, $id)
    {
        try {
            $jobAd->views()->create(['user_id' => $id]);

            return response()->json([
                'message' => 'Clinic new view'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }
}
