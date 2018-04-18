<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductAdCollection;
use App\Http\Resources\ProductAdResource;
use App\ProductAd;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAdController extends Controller
{
    public function index()
    {
        $productAds = ProductAd::with([
            'region',
            'city',
            'favs',
            'phoneNumbers',
            'category',
            'review',
            'views'
        ])
            ->paginate(10);

        return new ProductAdCollection($productAds);
    }


    public function show(ProductAd $productAd)
    {
        $productAd->load([
            'region',
            'city',
            'favs',
            'phoneNumbers',
            'category',
            'review',
            'views'
        ]);

        return new ProductAdResource($productAd);
    }

    public function fav(ProductAd $productAd, $id)
    {
        try {

            $productAd->favs()->firstOrCreate(['user_id' => $id]);

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

            $productAd->favs()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'ProductAd has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(ProductAd $productAd, $id)
    {
        try {
            $productAd->views()->create(['user_id' => $id]);

            return response()->json([
                'message' => 'Clinic new view'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }
}
