<?php

namespace App\Http\Controllers\Api\Misc;

use App\BeautyCenterSpeciality;
use App\CosmeticClinicSpeciality;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CosmeticClinicSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = CosmeticClinicSpeciality::all();

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
     * @param  \App\CosmeticClinicSpeciality  $cosmeticClinicSpeciality
     * @return \Illuminate\Http\Response
     */
    public function show(CosmeticClinicSpeciality $cosmeticClinicSpeciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CosmeticClinicSpeciality  $cosmeticClinicSpeciality
     * @return \Illuminate\Http\Response
     */
    public function edit(CosmeticClinicSpeciality $cosmeticClinicSpeciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CosmeticClinicSpeciality  $cosmeticClinicSpeciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CosmeticClinicSpeciality $cosmeticClinicSpeciality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CosmeticClinicSpeciality  $cosmeticClinicSpeciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(CosmeticClinicSpeciality $cosmeticClinicSpeciality)
    {
        //
    }
}
