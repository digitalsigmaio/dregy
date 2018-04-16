<?php

namespace App\Http\Controllers\Api;

use App\BeautyCenter;
use App\BeautyCenterFav;
use App\Http\Resources\BeautyCenterCollection;
use App\Http\Resources\BeautyCenterResource;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeautyCenterController extends Controller
{

    public function index()
    {
        $beautyCenters = BeautyCenter::with(['region', 'city', 'specialities', 'rates', 'favs', 'phoneNumbers', 'views'])->paginate(10);

        return new BeautyCenterCollection($beautyCenters);
    }

    public function show(BeautyCenter $beautyCenter)
    {
        $beautyCenter->load(['region', 'city', 'specialities', 'rates', 'favs', 'phoneNumbers', 'views']);

        return new BeautyCenterResource($beautyCenter);
    }

    public function fav(BeautyCenter $beautyCenter, $id)
    {
        try {

            $beautyCenter->favs()->firstOrCreate(['user_id' => $id]);

            return response()->json([
                'message' => 'Beauty Center has been saved to favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function unfav(BeautyCenter $beautyCenter, $id)
    {
        try {

            $beautyCenter->favs()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'Beauty Center has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function storeRate(BeautyCenter $beautyCenter, $id, Request $request)
    {
        try {
            $beautyCenter->rates()->firstOrCreate(['user_id' => $id],[ 'rate' => $request->rate]);
            return response()->json([
                'message' => 'Beauty Center has been rated'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function updateRate(BeautyCenter $beautyCenter, $id, Request $request)
    {
        try {
            $beautyCenter->rates()->updateOrCreate(['user_id' => $id], ['rate' => $request->rate]);
            return response()->json([
                'message' => 'Beauty Center has been rated'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(BeautyCenter $beautyCenter, $id)
    {
        try {

            $beautyCenter->views()->create(['user_id' => $id]);

            return response()->json([
                'message' => 'Beauty Center new view'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }
}
