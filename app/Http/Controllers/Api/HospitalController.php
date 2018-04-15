<?php

namespace App\Http\Controllers\Api;

use App\Hospital;
use App\Http\Resources\HospitalResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::with(['region', 'city', 'specialities', 'rates', 'favs', 'phoneNumbers'])->get();

        return response(HospitalResource::collection($hospitals));
    }
}
