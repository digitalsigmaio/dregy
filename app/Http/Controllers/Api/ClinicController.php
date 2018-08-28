<?php

namespace App\Http\Controllers\Api;

use App\Clinic;
use App\Http\Resources\ClinicCollection;
use App\Http\Resources\ClinicResource;
use App\View;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::with(['region', 'city', 'rates', 'favorites', 'phoneNumbers', 'views', 'premium', 'specialities'])->paginate(10);

        return new ClinicCollection($clinics);
    }

    public function show(Clinic $clinic)
    {
        $clinic->load(['region', 'city', 'rates', 'favorites', 'phoneNumbers', 'views', 'premium', 'specialities']);

        return new ClinicResource($clinic);
    }

    public function fav(Clinic $clinic, $id)
    {
        try {

            $clinic->favorites()->firstOrCreate(['user_id' => $id]);

            return response()->json([
                'message' => 'Clinic has been saved to favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function unfav(Clinic $clinic, $id)
    {
        try {

            $clinic->favorites()->whereUserId($id)->delete();

            return response()->json([
                'message' => 'Clinic has been removed from favorites'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function storeRate(Clinic $clinic, $id, Request $request)
    {

        try {
            $rate = $clinic->rawRates()->firstOrNew(['user_id' => $id]);
            $rate->rate = $request->rate;
            $rate->save();
            return response()->json([
                'message' => 'Clinic has been rated'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(Clinic $clinic, Request $request)
    {
        View::new($clinic, $request);

    }

    public function search(Request $request)
    {
        $clinics = Clinic::fetch($request);

        if (count($clinics)) {
            return new ClinicCollection($clinics);
        } else {
            return null;
        }
    }

    public function destroy(Clinic $clinic)
    {
        if ($clinic->delete()){
            return response()->json('Clinic has been deleted');
        } 
        else {
            return response()->json('Clinic was not found');
        }
        
    }
}
