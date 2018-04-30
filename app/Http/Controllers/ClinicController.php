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
        $specialities = ClinicSpeciality::join('specialities', 'clinic_speciality.speciality_id', '=', 'specialities.id')
            ->select('specialities.id', 'specialities.en_name', 'specialities.ar_name')
            ->groupBy('specialities.id', 'specialities.en_name', 'specialities.ar_name')
            ->get();
        $degrees = Degree::all();
        $filters = [
            'regions' => $regions,
            'specialities' => $specialities,
            'degrees' => $degrees
        ];
        $filtersJson = json_encode($filters);

        return view('clinics', compact(['filtersJson']));
    }
}
