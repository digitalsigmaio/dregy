<?php

namespace App\Http\Controllers;

use App\CosmeticClinicSpeciality;
use App\Region;
use Illuminate\Http\Request;

class CosmeticClinicController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $specialities = CosmeticClinicSpeciality::join('specialities', 'cosmetic_clinic_speciality.speciality_id', '=', 'specialities.id')
            ->select('specialities.id', 'specialities.en_name', 'specialities.ar_name')
            ->groupBy('specialities.id', 'specialities.en_name', 'specialities.ar_name')
            ->get();
        $filters = [
            'regions' => $regions,
            'specialities' => $specialities,
        ];
        $filtersJson = json_encode($filters);

        return view('cosmetics', compact(['filtersJson']));
    }
}
