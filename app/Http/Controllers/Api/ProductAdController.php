<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductAdCollection;
use App\Http\Resources\ProductAdResource;
use App\ProductAd;
use App\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductAdController extends Controller
{
    public function index()
    {
        $productAds = ProductAd::with([
            'region',
            'city',
            'favorites',
            'phoneNumbers',
            'category',
            'views',
            'premium'
        ])
            ->paginate(4);

        return new ProductAdCollection($productAds);
    }


    public function show(ProductAd $productAd)
    {
        $productAd->load([
            'region',
            'city',
            'favorites',
            'phoneNumbers',
            'category',
            'views',
            'premium'
        ]);

        return new ProductAdResource($productAd);
    }

    public function fav(ProductAd $productAd, $id)
    {
        try {

            $productAd->favorites()->firstOrCreate(['user_id' => $id]);

            return response()->json([
                'message' => 'ProductAd has been saved to favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function unfav(ProductAd $productAd, $id)
    {
        try {

            $productAd->favorites()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'ProductAd has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(ProductAd $productAd, Request $request)
    {
        View::new($productAd, $request);
    }

    public function search(Request $request)
    {
        $productAds = ProductAd::fetch($request);

        if (count($productAds)) {
            return new ProductAdCollection($productAds);
        } else {
            return null;
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | min:3',
            'price' => 'required',
            'description' => 'required | min:30',
            'status' => 'required',
            'categoryId' => 'required',
            'regionId' => 'required',
            'cityId' => 'required',
            'address' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user = Auth::user();
        $img = $request->img;
        $path = $img->hashName('images');
        dd($path);

    }
}
