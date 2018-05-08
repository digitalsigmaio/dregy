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

    public function show(Hospital $hospital, $slug){
        $relatedHospitals = $hospital->specialities()->first()->hospitals()->inrandomOrder()->take(9)->get();
        $relatedHospitals = $relatedHospitals->reject(function ($item) use ($hospital){
            return $item->id == $hospital->id;
        });
        $relatedHospitals = HospitalResource::collection($relatedHospitals);
        $relatedHospitalsChunks = $relatedHospitals->chunk(3);
        $relatedHospitalsChunks = json_encode($relatedHospitalsChunks);
        $hospital = new HospitalResource($hospital);
        $hospital = json_encode($hospital);

        return view('hospital', compact(['hospital', 'relatedHospitalsChunks']));
    }
}
