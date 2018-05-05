<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\ClinicSpeciality;
use App\Degree;
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

        return view('clinics', compact(['filters']));
    }

    public function show(Clinic $clinic, $slug){
        $relatedClinics = $clinic->specialities()->first()->clinics()->inrandomOrder()->take(9)->get();
        $relatedClinics = $relatedClinics->reject(function ($item) use ($clinic) {
           return $item->id == $clinic->id;
        });
        $relatedClinicsChunks = $relatedClinics->chunk(3);

        return view('clinic', compact(['clinic', 'relatedClinicsChunks']));
    }
}
