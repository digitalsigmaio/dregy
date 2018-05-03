<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\HospitalSpeciality;
use App\Http\Resources\HospitalResource;
use App\Region;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $specialities = HospitalSpeciality::all();
        $filters = collect([
            'regions' => $regions,
            'specialities' => $specialities,
        ]);

        return view('hospitals', compact(['filters']));
    }
}
