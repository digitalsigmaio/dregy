<?php

namespace App\Http\Controllers\Api\Misc;

use App\JobExperienceLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobExperienceLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobExperienceLevels = JobExperienceLevel::all();

        if (count($jobExperienceLevels)) {
            return response()->json([
                'data' => $jobExperienceLevels
            ], 200);
        } else {
            return response()->json([
                'message' => 'Nothing found'
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobExperienceLevel  $jobExperienceLevel
     * @return \Illuminate\Http\Response
     */
    public function show(JobExperienceLevel $jobExperienceLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobExperienceLevel  $jobExperienceLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(JobExperienceLevel $jobExperienceLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobExperienceLevel  $jobExperienceLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobExperienceLevel $jobExperienceLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobExperienceLevel  $jobExperienceLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobExperienceLevel $jobExperienceLevel)
    {
        //
    }
}
