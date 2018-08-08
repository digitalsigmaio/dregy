<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\ClinicSpeciality;
use App\Degree;
use App\Http\Resources\ClinicResource;
use App\Region;


class ClinicController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $specialities = ClinicSpeciality::all();
        $degrees = Degree::all();
        $filters = collect([
            'regions' => $regions,
            'specialities' => $specialities,
            'degrees' => $degrees
        ]);
        //return $filters;
        return view('clinics', compact(['filters']));
    }

    public function show(Clinic $clinic, $slug){
        $relatedClinics = $clinic->specialities()->first()->clinics()->inrandomOrder()->take(9)->get();
        $relatedClinics = $relatedClinics->reject(function ($item) use ($clinic) {
           return $item->id == $clinic->id;
        });
        $relatedClinics = ClinicResource::collection($relatedClinics);
        $relatedClinicsChunks = $relatedClinics->chunk(3);
        $relatedClinicsChunks = json_encode($relatedClinicsChunks);

        $clinic = new ClinicResource($clinic);
        $clinic = json_encode($clinic);

        return view('clinic', compact(['clinic', 'relatedClinicsChunks']));
    }
}
