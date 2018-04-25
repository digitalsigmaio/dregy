<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PharmacyCollection;
use App\Http\Resources\PharmacyResource;
use App\Pharmacy;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::with(['region', 'city', 'rates', 'favorites', 'phoneNumbers', 'views', 'premium'])->paginate(10);

        return new PharmacyCollection($pharmacies);
    }

    public function show(Pharmacy $pharmacy)
    {
        $pharmacy->load(['region', 'city', 'rates', 'favorites', 'phoneNumbers', 'views', 'premium']);

        return new PharmacyResource($pharmacy);
    }

    public function fav(Pharmacy $pharmacy, $id)
    {
        try {

            $pharmacy->favorites()->firstOrCreate(['user_id' => $id]);

            return response()->json([
                'message' => 'Pharmacy has been saved to favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function unfav(Pharmacy $pharmacy, $id)
    {
        try {

            $pharmacy->favorites()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'Pharmacy has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function storeRate(Pharmacy $pharmacy, $id, Request $request)
    {
        try {
            $pharmacy->rates()->updateOrCreate(['user_id' => $id],[ 'rate' => $request->rate]);
            return response()->json([
                'message' => 'Clinic has been rated'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(Pharmacy $pharmacy, Request $request)
    {
        $userId = $request->user_id;
        try {
            $pharmacy->views()->create(['user_id' => $userId]);

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
