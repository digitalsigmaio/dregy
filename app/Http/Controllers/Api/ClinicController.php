<?php

namespace App\Http\Controllers\Api;

use App\Clinic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::all();

        return response()->json([
            'data' => $clinics
        ], 200);
    }
}
