<?php

namespace App\Http\Controllers\Api\Misc;

use App\JobEducationLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobEducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobEducationLevels = JobEducationLevel::all();

        if (count($jobEducationLevels)) {
            return response()->json([
                'data' => $jobEducationLevels
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
     * @param  \App\JobEducationLevel  $jobEducationLevel
     * @return \Illuminate\Http\Response
     */
    public function show(JobEducationLevel $jobEducationLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobEducationLevel  $jobEducationLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(JobEducationLevel $jobEducationLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobEducationLevel  $jobEducationLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobEducationLevel $jobEducationLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobEducationLevel  $jobEducationLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobEducationLevel $jobEducationLevel)
    {
        //
    }
}
