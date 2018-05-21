<?php

namespace App\Http\Controllers;

use App\JobAdCategory;
use App\JobEducationLevel;
use App\JobEmploymentType;
use App\JobExperienceLevel;
use App\ProductAdCategory;
use App\Region;
use App\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('client.profile', compact('user'));
    }

    public function favoriteHospitals()
    {
        $user = Auth::user()->load('favoriteHospitals');
        $hospitals = [];
        $favs = $user->favoriteHospitals;
        foreach ($favs as $fav) {
            $hospitals[] = $fav->favourable;
        }
        $hospitals = json_encode($hospitals);
        return view('client.favoriteHospitals', compact(['user', 'hospitals']));
    }

    public function favoriteClinics()
    {
        $user = Auth::user()->load('favoriteClinics');
        $clinics = [];
        $favs = $user->favoriteClinics;
        foreach ($favs as $fav) {
            $clinics[] = $fav->favourable;
        }
        $clinics = json_encode($clinics);
        return view('client.favoriteClinics', compact(['user', 'clinics']));
    }

    public function favoritePharmacies()
    {
        $user = Auth::user()->load('favoritePharmacies');
        $pharmacies = [];
        $favs = $user->favoritePharmacies;
        foreach ($favs as $fav) {
            $pharmacies[] = $fav->favourable;
        }
        $pharmacies = json_encode($pharmacies);
        return view('client.favoritePharmacies', compact(['user', 'pharmacies']));
    }

    public function favoriteCosmeticClinics()
    {
        $user = Auth::user()->load('favoriteCosmeticClinics');
        $cosmeticClinics = [];
        $favs = $user->favoriteCosmeticClinics;
        foreach ($favs as $fav) {
            $cosmeticClinics[] = $fav->favourable;
        }
        $cosmeticClinics = json_encode($cosmeticClinics);
        return view('client.favoriteCosmeticClinics', compact(['user', 'cosmeticClinics']));
    }

    public function favoriteProducts()
    {
        $user = Auth::user()->load('favoriteProductAds');
        $products = [];
        $favs = $user->favoriteProductAds;
        foreach ($favs as $fav) {
            $products[] = $fav->favourable;
        }
        $products = json_encode($products);
        return view('client.favoriteProducts', compact(['user', 'products']));
    }

    public function favoriteJobs()
    {
        $user = Auth::user()->load('favoriteJobAds');
        $jobs = [];
        $favs = $user->favoriteJobAds;
        foreach ($favs as $fav) {
            $jobs[] = $fav->favourable;
        }
        $jobs = json_encode($jobs);
        return view('client.favoriteJobs', compact(['user', 'jobs']));
    }

    public function createProduct()
    {
        $categories = ProductAdCategory::all();
        $regions = Region::with('cities')->get();
        return view('client.newProduct', compact(['categories', 'regions']));
    }

    public function createJob()
    {
        $categories = JobAdCategory::all();
        $regions = Region::with('cities')->get();
        $experienceLevels = JobExperienceLevel::all();
        $educationLevels = JobEducationLevel::all();
        $employmentTypes = JobEmploymentType::all();

        return view('client.newJob', compact(['categories', 'regions', 'experienceLevels', 'educationLevels', 'employmentTypes']));
    }

}
