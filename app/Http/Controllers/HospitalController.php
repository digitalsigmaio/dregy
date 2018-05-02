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
        $specialities = HospitalSpeciality::join('specialities', 'hospital_speciality.speciality_id', '=', 'specialities.id')
            ->select('specialities.id', 'specialities.en_name', 'specialities.ar_name')
            ->groupBy('specialities.id', 'specialities.en_name', 'specialities.ar_name')
            ->get();
        $filters = [
            'regions' => $regions,
            'specialities' => $specialities,
        ];
        $filtersJson = json_encode($filters);
        $hospitals = json_encode(HospitalResource::collection(
            Hospital::with(
                ['region',
                    'city',
                    'specialities',
                    'rates',
                    'favorites',
                    'phoneNumbers',
                    'views',
                    'premium'
                ]
            )->paginate(10)
        ));
        return view('hospitals', compact(['filtersJson', 'hospitals']));
    }
}
