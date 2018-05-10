<?php

namespace App\Http\Controllers\Api;

use App\Hospital;
use App\Http\Resources\HospitalCollection;
use App\Http\Resources\HospitalResource;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::with(['region', 'city', 'specialities', 'rates', 'favorites', 'phoneNumbers', 'views', 'premium'])->paginate(10);

        return new HospitalCollection($hospitals);
    }

    public function show(Hospital $hospital)
    {
        $hospital->load(['region', 'city', 'specialities', 'rates', 'favorites', 'phoneNumbers', 'views', 'premium']);

        return new HospitalResource($hospital);
    }

    public function fav(Hospital $hospital, $id)
    {
        try {

            $hospital->favorites()->firstOrCreate(['user_id' => $id]);

            return response()->json([
                'message' => 'Hospital has been saved to favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function unfav(Hospital $hospital, $id)
    {
        try {

            $hospital->favorites()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'Hospital has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function storeRate(Hospital $hospital, $id, Request $request)
    {
        try {
            $rate = $hospital->rawRates()->firstOrNew(['user_id' => $id]);
            $rate->rate = $request->rate;
            $rate->save();

            return response()->json([
                'message' => 'Hospital has been rated'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }


    public function view(Hospital $hospital, Request $request)
    {
        $userId = $request->user_id;
        $userAgent = $request->header('user-agent');
        $userIp = Request::ip();

        try {

            $hospital->views()->create([
                'user_id' => $userId,
                'user_agent' => $userAgent,
                'user_ip'   => $userIp
                ]);

            return response()->json([
                'message' => 'Hospital new view'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function search(Request $request)
    {
        $hospitals = Hospital::fetch($request);

        if (count($hospitals)) {
            return new HospitalCollection($hospitals);
        } else {
            return null;
        }
    }
}
