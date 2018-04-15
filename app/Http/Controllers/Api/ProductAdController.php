<?php

namespace App\Http\Controllers\Api;

use App\ProductAd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAdController extends Controller
{
    public function index()
    {
        $productAds = ProductAd::all();

        return response()->json([
            'data' => $productAds
        ], 200);
    }
}
