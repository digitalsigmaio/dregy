<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductAdCollection;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private static function favoritesArray($favorites)
    {
        $array = [];
        foreach($favorites as $favorite) {
            $array[] = $favorite->favourable;
        }

        return $array;
    }

    public function favorites(User $user, Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);

        switch ($request->category) {
            case 'product':
                return $user->favoriteProductAds;
                break;
            case 'job':
                return $user->favoriteJobAds;
                break;
            case 'hospital':
                return $user->favoriteHospitals;
                break;
            case 'pharmacy':
                return $user->favoritePharmacies;
                break;
            case 'clinic':
                return $user->favoriteClinics;
                break;

            case 'cosmetic':
                return $user->favoriteCosmeticClinics;
                break;
            default:
                return null;
                break;
        }
    }

    public function favoriteHospitals(User $user)
    {
        $favorites = $user->favoriteHospitals;

        $hospitals = self::favoritesArray($favorites);

        return response()->json($hospitals);
    }

    public function favoriteClinics(User $user)
    {
        $favorites = $user->favoriteClinics;

        $clinics = self::favoritesArray($favorites);

        return response()->json($clinics);
    }

    public function favoriteCosmeticClinics(User $user)
    {
        $favorites = $user->favoriteCosmeticClinics;

        $cosmetics = self::favoritesArray($favorites);

        return response()->json($cosmetics);
    }

    public function favoritePharmacies(User $user)
    {
        $favorites = $user->favoritePharmacies;

        $pharmacies = self::favoritesArray($favorites);

        return response()->json($pharmacies);
    }

    public function favoriteProducts(User $user)
    {
        $favorites = $user->favoriteProductAds;

        $products = new ProductAdCollection(self::favoritesArray($favorites));

        return response()->json($products);
    }

    public function favoriteJobs(User $user)
    {
        $favorites = $user->favoriteJobAds;

        $jobs = self::favoritesArray($favorites);

        return response()->json($jobs);
    }
}
