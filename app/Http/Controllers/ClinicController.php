<?php

namespace App\Http\Controllers;

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
}
