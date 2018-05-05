<?php

namespace App\Http\Controllers;

use App\ProductAd;
use App\ProductAdCategory;
use App\Region;
use App\User;
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

    public function show(User $user, ProductAd $productAd){
        $relatedProducts = $productAd->category->productAds()->inrandomOrder()->take(9)->get();

        $relatedProductsChunks = $relatedProducts->chunk(3);
        return view('product', compact(['productAd', 'relatedProductsChunks']));
    }
}
