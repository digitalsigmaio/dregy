<?php

namespace App\Http\Controllers\Api;

use App\BeautyCenter;
use App\Http\Resources\BeautyCenterResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeautyCenterController extends Controller
{
    public function index()
    {
        $beautyCenters = BeautyCenter::with(['region', 'city', 'specialities', 'rates', 'favs', 'phoneNumbers'])->get();

        return response(BeautyCenterResource::collection($beautyCenters));
    }

    public function show(BeautyCenter $beautyCenter)
    {
        $beautyCenter->load(['region', 'city', 'user']);
        return response(new BeautyCenterResource($beautyCenter));
    }
}
