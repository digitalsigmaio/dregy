<?php

namespace App\Http\Controllers\Api;

use App\ProductAdCategory;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductFilterController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $categories = ProductAdCategory::all();




        return response()->json([
            'data' => [
                'regions' => $regions,
                'categories' => $categories,
            ]
        ], 200);

    }
}
