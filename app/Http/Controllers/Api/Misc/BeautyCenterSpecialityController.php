<?php

namespace App\Http\Controllers\Api\Misc;

use App\BeautyCenterSpeciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeautyCenterSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = BeautyCenterSpeciality::all();

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
     * @param  \App\BeautyCenterSpeciality  $beautyCenterSpeciality
     * @return \Illuminate\Http\Response
     */
    public function show(BeautyCenterSpeciality $beautyCenterSpeciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BeautyCenterSpeciality  $beautyCenterSpeciality
     * @return \Illuminate\Http\Response
     */
    public function edit(BeautyCenterSpeciality $beautyCenterSpeciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BeautyCenterSpeciality  $beautyCenterSpeciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeautyCenterSpeciality $beautyCenterSpeciality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BeautyCenterSpeciality  $beautyCenterSpeciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeautyCenterSpeciality $beautyCenterSpeciality)
    {
        //
    }
}
