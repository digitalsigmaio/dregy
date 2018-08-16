<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\ClinicSpeciality;
use App\Degree;
use App\Http\Resources\ClinicResource;
use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ClinicController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $specialities = ClinicSpeciality::all();
        $degrees = Degree::all();
        $filters = collect([
            'regions' => $regions,
            'specialities' => $specialities,
            'degrees' => $degrees
        ]);
        //return $filters;
        return view('clinics', compact(['filters']));
    }

    public function show(Clinic $clinic, $slug){
        $relatedClinics = $clinic->specialities()->first()->clinics()->inrandomOrder()->take(9)->get();
        $relatedClinics = $relatedClinics->reject(function ($item) use ($clinic) {
           return $item->id == $clinic->id;
        });
        $relatedClinics = ClinicResource::collection($relatedClinics);
        $relatedClinicsChunks = $relatedClinics->chunk(3);
        $relatedClinicsChunks = json_encode($relatedClinicsChunks);

        $clinic = new ClinicResource($clinic);
        $clinic = json_encode($clinic);

        return view('clinic', compact(['clinic', 'relatedClinicsChunks']));
    }

    //Admin Area Controll

    public function list()
    {
        $admin = Auth('admin')->user();
        $account_url = '/api/clinics/search';
        $account_name = 'List Clinics';
        $delete_url = '/api/clinics/clinic/';
        return view('admin.clinic.listClinic', compact('admin','account_url', 'account_name', 'delete_url'));
    }

    public function create()
    {
        $admin = Auth('admin')->user();
        $regions = Region::with('cities')->get();
        $regions = json_encode($regions);
        $degrees = Degree::all();
        $specialities = ClinicSpeciality::all();

        return View('admin.clinic.newClinic', compact('admin', 'regions', 'degrees','specialities'));
    }

    public function store(Request $request)
    {
        $admin= Auth('admin')->user();
        $request->validate([
            'ar_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
            'region_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'ar_address' => 'required|string|max:255',
            'en_address' => 'required|string|max:255',
            'ar_note' => 'nullable|string|max:255',
            'en_note' => 'nullable|string|max:255',
            'ar_work_times' => 'required',
            'en_work_times' => 'required',
            'website' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:hospitals',
            'img' => 'image|nullable|mimes:jpeg,bmp,png|max:5000',
            'ref_id' => 'required',
        ]);
        $user = USER::where('ref_id', $request->ref_id)->first();

        if ($user !== null) {
            $clinic = $user->clinics()->create([
                'admin_id'=> $admin->id,
                'ar_name' => $request->ar_name,
                'en_name' => $request->en_name,
                'region_id' => $request->region_id,
                'city_id' => $request->city_id,
                'ar_address' => $request->ar_address,
                'en_address' => $request->en_address,
                'ar_note' => $request->ar_note,
                'en_note' => $request->en_note,
                'ar_work_times' => $request->ar_work_times,
                'en_work_times' => $request->en_work_times,
                'website' => $request->website,
                'email' => $request->email,
                'slug' => str_slug($request->en_name),
                'degree_id' => $request->degree_id
            ]);
        

            $clinic->specialities()->attach($request->speciality_id);

            if ($request->premium === 'true') {
                $clinic->premium()->create([
                'admin_id' => $admin->id,
                'priority' => $request->priority,
                'expires_at' => $request->expires_at,
            ]);
            }

            if ($request->hasFile('img')) {
                $clinic->uploadImage($request->img);
            }

            $clinic->save();

            session()->flash('message', 'Clinic Successfully Created');
            return redirect()->back();
        }else{
            session()->flash('message', 'Invalid User Ref');
            return redirect()->back();

        }

    }
}
