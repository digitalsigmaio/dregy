<?php

namespace App\Http\Controllers\Api;

use App\CosmeticClinic;
use App\BeautyCenterFav;
use App\Http\Resources\CosmeticClinicCollection;
use App\Http\Resources\CosmeticClinicResource;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CosmeticClinicController extends Controller
{

    public function index()
    {
        $cosmeticClinics = CosmeticClinic::with(['region', 'city', 'specialities', 'rates', 'favorites', 'phoneNumbers', 'views', 'premium'])->paginate(10);

        return new CosmeticClinicCollection($cosmeticClinics);
    }

    public function show(CosmeticClinic $cosmeticClinic)
    {
        $cosmeticClinic->load(['region', 'city', 'specialities', 'rates', 'favorites', 'phoneNumbers', 'views', 'premium']);

        return new CosmeticClinicResource($cosmeticClinic);
    }

    public function fav(CosmeticClinic $cosmeticClinic, $id)
    {
        try {

            $cosmeticClinic->favorites()->firstOrCreate(['user_id' => $id]);

            return response()->json([
                'message' => 'Beauty Center has been saved to favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function unfav(CosmeticClinic $cosmeticClinic, $id)
    {
        try {

            $cosmeticClinic->favorites()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'Beauty Center has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function storeRate(CosmeticClinic $cosmeticClinic, $id, Request $request)
    {
        try {
            $cosmeticClinic->rates()->updateOrCreate(['user_id' => $id],[ 'rate' => $request->rate]);
            return response()->json([
                'message' => 'Beauty Center has been rated'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(CosmeticClinic $cosmeticClinic, Request $request)
    {
        $userId = $request->user_id;
        try {

            $cosmeticClinic->views()->create(['user_id' => $userId]);

            return response()->json([
                'message' => 'Beauty Center new view'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function search(Request $request)
    {
        $cosmeticClinics = CosmeticClinic::fetch($request);

        if (count($cosmeticClinics)) {
            return new CosmeticClinicCollection($cosmeticClinics);
        } else {
            return response()->json([
                'message' => 'Nothing found'
            ], 404);
        }
    }
}
