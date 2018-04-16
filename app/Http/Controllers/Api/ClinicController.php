<?php

namespace App\Http\Controllers\Api;

use App\Clinic;
use App\Http\Resources\ClinicCollection;
use App\Http\Resources\ClinicResource;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::with(['region', 'city', 'rates', 'favs', 'phoneNumbers', 'views'])->paginate(10);

        return new ClinicCollection($clinics);
    }

    public function show(Clinic $clinic)
    {
        $clinic->load(['region', 'city', 'rates', 'favs', 'phoneNumbers', 'views']);

        return new ClinicResource($clinic);
    }

    public function fav(Clinic $clinic, $id)
    {
        try {

            $clinic->favs()->firstOrCreate(['user_id' => $id]);

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

            $clinic->favs()->whereUserId($id)->delete();

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
            $clinic->rates()->updateOrCreate(['user_id' => $id],[ 'rate' => $request->rate]);
            return response()->json([
                'message' => 'Clinic has been rated'
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 403);
        }
    }

    public function view(Clinic $clinic, $id)
    {
        try {
            $clinic->views()->create(['user_id' => $id]);

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
