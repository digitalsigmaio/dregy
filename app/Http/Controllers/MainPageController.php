<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\CosmeticClinic;
use App\Hospital;
use App\Http\Resources\ClinicCollection;
use App\Http\Resources\CosmeticClinicCollection;
use App\Http\Resources\HospitalCollection;
use App\Http\Resources\JobAdCollection;
use App\Http\Resources\PharmacyCollection;
use App\JobAd;
use App\Pharmacy;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index() {
        return view('landing');
    }

    public function topClients() {
        $hospitals = Hospital::with(['rates', 'user', 'favorites'])->whereHas('premium', function ($query) {
            $query->where('priority', '=', '1');
        })->inRandomOrder()->get()->take(3);

        $pharmacies = Pharmacy::with(['rates', 'user', 'favorites'])->whereHas('premium', function ($query) {
            $query->where('priority', '=', '1');
        })->inRandomOrder()->take(3)->get();

        $clinics = Clinic::with(['rates', 'user', 'favorites'])->whereHas('premium', function ($query) {
            $query->where('priority', '=', '1');
        })->inRandomOrder()->take(3)->get();

        $cosmetics = CosmeticClinic::with(['rates', 'user'])->whereHas('premium', function ($query) {
            $query->where('priority', '=', '1');
        })->inRandomOrder()->take(3)->get();

        return response()->json([
            'hospitals' => new HospitalCollection($hospitals),
            'pharmacies' => new PharmacyCollection($pharmacies),
            'clinics' => new  ClinicCollection($clinics),
            'cosmetics' => new CosmeticClinicCollection($cosmetics)
        ]);
    }

    public function jobList() {
        $newJobs = JobAd::with(['favorites', 'views', 'user'])->orderBy('updated_at', 'desc')->take(3)->get();
        $hotJobs = JobAd::with(['favorites', 'views', 'user'])->whereHas('views', function ($query) {
            $query->selectRaw('COUNT(viewable_id) as views')->orderBy('views', 'desc');
        })->take(3)->get();
        $randomJobs = JobAd::with(['favorites', 'views', 'user'])->inRandomOrder()->take(3)->get();

        return response()->json([
            'newJobs' => new JobAdCollection($newJobs),
            'hotJobs' => new JobAdCollection($hotJobs),
            'randomJobs' => new  JobAdCollection($randomJobs),
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

}
