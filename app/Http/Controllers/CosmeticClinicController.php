<?php

namespace App\Http\Controllers;

use App\CosmeticClinic;
use App\CosmeticClinicSpeciality;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CosmeticClinicController extends Controller
{
    public function index()
    {
        dd(Auth::user());
        $regions = Region::with('cities')->get();
        $specialities = CosmeticClinicSpeciality::all();
        $filters = collect([
            'regions' => $regions,
            'specialities' => $specialities,
        ]);

        return view('cosmetics', compact(['filters']));
    }

    public function show(CosmeticClinic $cosmeticClinic, $slug){
        $relatedCosmeticClinics = $cosmeticClinic->specialities()->first()->cosmeticClinics()->inrandomOrder()->take(9)->get();
        $relatedCosmeticClinics = $relatedCosmeticClinics->reject(function ($item) use ($cosmeticClinic) {
            return $item->id == $cosmeticClinic->id;
        });
        $relatedCosmeticClinicsChunks = $relatedCosmeticClinics->chunk(3);

        return view('cosmetic', compact(['cosmeticClinic', 'relatedCosmeticClinicsChunks']));
    }
}
