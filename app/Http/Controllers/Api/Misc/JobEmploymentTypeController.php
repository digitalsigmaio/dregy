<?php

namespace App\Http\Controllers\Api\Misc;

use App\JobEmploymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobEmploymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobEmploymentTypes = JobEmploymentType::all();

        if (count($jobEmploymentTypes)) {
            return response()->json([
                'data' => $jobEmploymentTypes
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
     * @param  \App\JobEmploymentType  $jobEmploymentType
     * @return \Illuminate\Http\Response
     */
    public function show(JobEmploymentType $jobEmploymentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobEmploymentType  $jobEmploymentType
     * @return \Illuminate\Http\Response
     */
    public function edit(JobEmploymentType $jobEmploymentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobEmploymentType  $jobEmploymentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobEmploymentType $jobEmploymentType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobEmploymentType  $jobEmploymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobEmploymentType $jobEmploymentType)
    {
        //
    }
}
