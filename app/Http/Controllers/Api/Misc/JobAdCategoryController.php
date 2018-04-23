<?php

namespace App\Http\Controllers\Api\Misc;

use App\JobAdCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobAdCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = JobAdCategory::all();

        if (count($categories)) {
            return response()->json([
                'data' => $categories
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
     * @param  \App\JobAdCategory  $jobAdCategory
     * @return \Illuminate\Http\Response
     */
    public function show(JobAdCategory $jobAdCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobAdCategory  $jobAdCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(JobAdCategory $jobAdCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobAdCategory  $jobAdCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobAdCategory $jobAdCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobAdCategory  $jobAdCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobAdCategory $jobAdCategory)
    {
        //
    }
}
