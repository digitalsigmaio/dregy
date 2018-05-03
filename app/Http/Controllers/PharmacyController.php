<?php

namespace App\Http\Controllers;

use App\Http\Resources\PharmacyResource;
use App\Pharmacy;
use App\Region;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();

        $filters = collect([
            'regions' => $regions,
        ]);
        return view('pharmacies', compact(['filters']));
    }
}
