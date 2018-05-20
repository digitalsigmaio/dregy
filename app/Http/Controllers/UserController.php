<?php

namespace App\Http\Controllers;

use App\Http\Resources\HospitalResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function favoriteHospitals(User $user)
    {
        $favorites = $user->favoriteHospitals;

        return response()->json($favorites);
    }

    public function favoriteClinics(User $user)
    {
        $favorites = $user->favoriteClinics;

        return response()->json($favorites);
    }

    public function favoriteCosmeticClinics(User $user)
    {
        $favorites = $user->favoriteCosmeticClinics;

        return response()->json($favorites);
    }

    public function favoritePharmacies(User $user)
    {
        $favorites = $user->favoritePharmacies;

        return response()->json($favorites);
    }

    public function favoriteProducts(User $user)
    {
        $favorites = $user->favoriteProductAds;

        return response()->json($favorites);
    }

    public function favoriteJobs(User $user)
    {
        $favorites = $user->favoriteJobAds;

        return response()->json($favorites);
    }
}
