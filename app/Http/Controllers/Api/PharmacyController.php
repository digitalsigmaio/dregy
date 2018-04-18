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
        $pharmacies = Pharmacy::with(['region', 'city', 'rates', 'favs', 'phoneNumbers'])->withCount('views')->paginate(10);

        return new PharmacyCollection($pharmacies);
    }

    public function show(Pharmacy $pharmacy)
    {
        $pharmacy->load(['region', 'city', 'rates', 'favs', 'phoneNumbers', 'views']);

        return new PharmacyResource($pharmacy);
    }

    public function fav(Pharmacy $pharmacy, $id)
    {
        try {

            $pharmacy->favs()->firstOrCreate(['user_id' => $id]);

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

            $pharmacy->favs()->whereUserId($id)->delete();

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

    public function view(Pharmacy $pharmacy, $id)
    {
        try {
            $pharmacy->views()->create(['user_id' => $id]);

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
