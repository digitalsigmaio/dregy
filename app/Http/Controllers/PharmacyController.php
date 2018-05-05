<?php

namespace App\Http\Controllers;

use App\Http\Resources\PharmacyResource;
use App\Pharmacy;
use App\Region;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();

        $filters = collect([
            'regions' => $regions,
        ]);
        return view('pharmacies', compact(['filters']));
    }

    public function show(Pharmacy $pharmacy, $slug){
        $relatedPharmacies = Pharmacy::where('full_time', $pharmacy->full_time)->where('delivery', $pharmacy->delivery)->inrandomOrder()->take(9)->get();
        $relatedPharmacies = $relatedPharmacies->reject(function ($item) use ($pharmacy) {
            return $item->id == $pharmacy->id;
        });
        $relatedPharmaciesChunks = $relatedPharmacies->chunk(3);

        return view('pharmacy', compact(['pharmacy', 'relatedPharmaciesChunks']));
    }
}
