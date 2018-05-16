<?php

namespace App\Http\Controllers\Api;

use App\CosmeticClinic;
use App\BeautyCenterFav;
use App\Http\Resources\CosmeticClinicCollection;
use App\Http\Resources\CosmeticClinicResource;
use App\User;
use App\View;
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
            $rate = $cosmeticClinic->rawRates()->firstOrNew(['user_id' => $id]);
            $rate->rate = $request->rate;
            $rate->save();

            return response()->json([
                'message' => 'Cosmetic clinic has been rated'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(CosmeticClinic $cosmeticClinic, Request $request)
    {
        View::new($cosmeticClinic, $request);
    }

    public function search(Request $request)
    {
        $cosmeticClinics = CosmeticClinic::fetch($request);

        if (count($cosmeticClinics)) {
            return new CosmeticClinicCollection($cosmeticClinics);
        } else {
            return null;
        }
    }
}
