<?php

namespace App\Http\Controllers;

use App\HospitalSpeciality;
use App\Region;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $specialities = HospitalSpeciality::join('specialities', 'hospital_speciality.speciality_id', '=', 'specialities.id')
            ->select('specialities.id', 'specialities.en_name', 'specialities.ar_name')
            ->groupBy('specialities.id', 'specialities.en_name', 'specialities.ar_name')
            ->get();
        $filters = [
            'regions' => $regions,
            'specialities' => $specialities,
        ];
        $filtersJson = json_encode($filters);

        return view('hospitals', compact(['filtersJson']));
    }
}
