<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductAdResource;
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

    public function show(ProductAd $productAd, $slug){
        $relatedProducts = $productAd->category->productAds()->inrandomOrder()->take(9)->get();

        $relatedProducts = $relatedProducts->reject(function ($item) use ($productAd) {
            return $item->id == $productAd->id;
        });

        $relatedProducts = ProductAdResource::collection($relatedProducts);
        $relatedProductsChunks = $relatedProducts->chunk(3);
        $relatedProductsChunks = json_encode($relatedProductsChunks);

        $productAd = new ProductAdResource($productAd);
        $productAd = json_encode($productAd);

        return view('product', compact(['productAd', 'relatedProductsChunks']));
    }
}
