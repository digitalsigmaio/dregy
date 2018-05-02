<?php

namespace App\Http\Controllers\Api\Misc;

use App\ClinicSpeciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClinicSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = ClinicSpeciality::all();

        if (count($specialities)) {
            return response()->json([
                'data' => $specialities
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
     * @param  \App\ClinicSpeciality  $clinicSpeciality
     * @return \Illuminate\Http\Response
     */
    public function show(ClinicSpeciality $clinicSpeciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClinicSpeciality  $clinicSpeciality
     * @return \Illuminate\Http\Response
     */
    public function edit(ClinicSpeciality $clinicSpeciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClinicSpeciality  $clinicSpeciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClinicSpeciality $clinicSpeciality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClinicSpeciality  $clinicSpeciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClinicSpeciality $clinicSpeciality)
    {
        //
    }
}
