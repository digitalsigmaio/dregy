<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class JobAdController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();

        return view('jobs', compact('regions'));
    }
}
