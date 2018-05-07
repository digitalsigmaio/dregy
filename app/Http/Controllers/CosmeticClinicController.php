<?php

namespace App\Http\Controllers;

use App\CosmeticClinic;
use App\CosmeticClinicSpeciality;
use App\Http\Resources\CosmeticClinicResource;
use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CosmeticClinicController extends Controller
{
    public function index()
    {

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
        $relatedCosmeticClinics = CosmeticClinicResource::collection($relatedCosmeticClinics);
        $relatedCosmeticClinicsChunks = $relatedCosmeticClinics->chunk(3);
        $relatedCosmeticClinicsChunks = json_encode($relatedCosmeticClinicsChunks);
        $cosmetic = new CosmeticClinicResource($cosmeticClinic);
        $cosmetic = json_encode($cosmetic);

        return view('cosmetic', compact(['cosmetic', 'relatedCosmeticClinicsChunks']));
    }
}
