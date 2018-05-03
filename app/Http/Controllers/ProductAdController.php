<?php

namespace App\Http\Controllers;

use App\ProductAdCategory;
use App\Region;
use Illuminate\Http\Request;

class ProductAdController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $categories = ProductAdCategory::all();
        $status = ['new', 'used'];
        $filters = collect([
            'regions' => $regions,
            'categories' => $categories,
            'status' => $status
        ]);

        return view('products', compact(['filters']));
    }
}
