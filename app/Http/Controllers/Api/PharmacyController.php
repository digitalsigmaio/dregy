<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PharmacyCollection;
use App\Http\Resources\PharmacyResource;
use App\Pharmacy;
use App\View;
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
            $rate = $pharmacy->rawRates()->firstOrNew(['user_id' => $id]);
            $rate->rate = $request->rate;
            $rate->save();

            return response()->json([
                'message' => 'Pharmacy has been rated',
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(Pharmacy $pharmacy, Request $request)
    {
        View::new($pharmacy, $request);
    }

    public function search(Request $request)
    {
        $pharmacies = Pharmacy::fetch($request);

        if (count($pharmacies)) {
            return new PharmacyCollection($pharmacies);
        } else {
            return null;
        }

    }

    public function destroy(Pharmacy $pharmacy)
    {
        if($pharmacy->delete())
        {
            return response()->json('Pharmacy Successfully Deleted');
        }else{
            return response()->json('Pharmacy Not Found');
        }
    }
}
