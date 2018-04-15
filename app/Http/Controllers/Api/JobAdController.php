<?php

namespace App\Http\Controllers\Api;

use App\JobAd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobAdController extends Controller
{
    public function index()
    {
        $jobAds = JobAd::all();

        return response()->json([
            'data' => $jobAds
        ], 200);
    }
}
