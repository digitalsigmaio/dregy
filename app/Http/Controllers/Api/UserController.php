<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
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
}
