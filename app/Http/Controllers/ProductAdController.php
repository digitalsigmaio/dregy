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
        $filters = [
            'regions' => $regions,
            'categories' => $categories,
            'status' => $status
        ];
        $filtersJson = json_encode($filters);

        return view('products', compact(['filtersJson']));
    }
}
