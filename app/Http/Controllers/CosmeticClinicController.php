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
        $specialities = CosmeticClinicSpeciality::all();
        $filters = collect([
            'regions' => $regions,
            'specialities' => $specialities,
        ]);

        return view('cosmetics', compact(['filters']));
    }
}
