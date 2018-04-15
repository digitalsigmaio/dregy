<?php

namespace App\Http\Controllers\Api;

use App\Pharmacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::all();

        return response()->json([
            'data' => $pharmacies
        ], 200);
    }
}
