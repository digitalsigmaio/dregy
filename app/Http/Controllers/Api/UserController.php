<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ClinicCollection;
use App\Http\Resources\CosmeticClinicCollection;
use App\Http\Resources\HospitalCollection;
use App\Http\Resources\JobAdCollection;
use App\Http\Resources\JobAdResource;
use App\Http\Resources\PharmacyCollection;
use App\Http\Resources\ProductAdCollection;
use App\Http\Resources\ProductAdResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\Resource;

class UserController extends Controller
{
    private static function favoritesCollection($favorites)
    {
        $collection = collect();
        foreach($favorites as $favorite) {
            $collection->push($favorite->favourable);
        }

        return $collection;
    }

    public function ratings(User $user, Request $request)
    {
        $request->validate([
            'category' => 'required'
        ]);

        switch ($request->category) {
            case 'hospital':
                return $user->rateForHospitals;
                break;
            case 'pharmacy':
                return $user->rateForPharmacies;
                break;
            case 'clinic':
                return $user->rateForClinics;
                break;

            case 'cosmetic':
                return $user->rateForCosmeticClinics;
                break;
            default:
                return null;
                break;
        }
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
        $hospitals = self::favoritesCollection($user->favoriteHospitals);

        return new HospitalCollection($hospitals);
    }

    public function favoriteClinics(User $user)
    {

        $clinics = self::favoritesCollection($user->favoriteClinics);

        return new ClinicCollection($clinics);
    }

    public function favoriteCosmeticClinics(User $user)
    {
        $cosmetics = self::favoritesCollection($user->favoriteCosmeticClinics);

        return new CosmeticClinicCollection($cosmetics);
    }

    public function favoritePharmacies(User $user)
    {
        $pharmacies = self::favoritesCollection($user->favoritePharmacies);

        return new PharmacyCollection($pharmacies);
    }

    public function favoriteProducts(User $user)
    {
        $products = self::favoritesCollection($user->favoriteProductAds);

        return new ProductAdCollection($products);
    }

    public function favoriteJobs(User $user)
    {
        $jobs = self::favoritesCollection($user->favoriteJobAds);

        return new JobAdCollection($jobs);
    }

    public function jobList(User $user)
    {

        $jobs = $user->jobAds->load(
            'region',
            'city',
            'favorites',
            'phoneNumbers',
            'category',
            'experienceLevel',
            'employmentType',
            'type',
            'educationLevel',
            'views',
            'premium'
        );

        return $jobs;
    }

    public function productList(User $user)
    {

        $products = $user->productAds->load(
            'region',
            'city',
            'user',
            'favorites',
            'phoneNumbers',
            'category',
            'views',
            'premium');

        return $products;
    }
}
