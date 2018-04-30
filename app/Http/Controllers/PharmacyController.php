<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();

        $filters = [
            'regions' => $regions,
        ];
        $filtersJson = json_encode($filters);

        return view('pharmacies', compact(['filtersJson']));
    }
}
