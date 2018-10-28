<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\HospitalSpeciality;
use App\Http\Resources\HospitalResource;
use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{
    public function index()
    {
        $regions = Region::with('cities')->get();
        $specialities = HospitalSpeciality::all();
        $filters = collect([
            'regions' => $regions,
            'specialities' => $specialities,
        ]);

        return view('hospitals', compact(['filters']));
    }

    public function show(Hospital $hospital, $slug){
        $relatedHospitals = $hospital->specialities()->first()->hospitals()->inrandomOrder()->take(9)->get();
        $relatedHospitals = $relatedHospitals->reject(function ($item) use ($hospital){
            return $item->id == $hospital->id;
        });
        $relatedHospitals = HospitalResource::collection($relatedHospitals);
        $relatedHospitalsChunks = $relatedHospitals->chunk(3);
        $relatedHospitalsChunks = json_encode($relatedHospitalsChunks);
        $hospital = new HospitalResource($hospital);
        $hospital = json_encode($hospital);

        return view('hospital', compact(['hospital', 'relatedHospitalsChunks']));
    }

    // Admin Area

    public function list()
    {
        $admin = Auth('admin')->user();
        $account_url = '/api/hospitals/search';
        $account_name = 'List Hospitals';
        $delete_url = '/api/hospitals/hospital/';
        $edit_url = '/admin/hospitals/edit/';
        return view('admin.hospital.listHospital', compact('admin','account_url', 'account_name', 'delete_url', 'edit_url'));
    }

    public function create()
    {
        $admin = Auth('admin')->user();
        $regions = Region::with('cities')->get();
        $regions = json_encode($regions);
        $specialities = HospitalSpeciality::all();
        return view('admin.hospital.newHospital', compact('admin', 'regions', 'specialities'));
    }

    public function store(Request $request)
    {
        $admin = Auth('admin')->user();
        
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
            'email' => 'nullable|email',
            'img' => 'image|nullable|mimes:jpeg,bmp,png|max:5000',
            'ref_id' => 'required',
            'phones*' => "required",
        ]);
       
        $user = User::where('ref_id', $request->ref_id)->first();

        if ($user !== null) {
            $hospital = $user->hospitals()->create([
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
        ]);

        $hospital->specialities()->attach($request->speciality_id);

        if($request->premium === "true") {
            $hospital->premium()->create([
                'admin_id' => $admin->id,
                'priority' => $request->priority,
                'expires_at' => $request->expires_at,
                ]);
        }

        if(count($request->phones))
        {
            foreach($request->phones as $phone)
            {
                $hospital->phoneNumbers()->create([
                    'number' => $phone,
                ]);
            }
        }

        if($request->hasFile('img'))
        {
            $hospital->uploadImage($request->img);
        }
        
        $hospital->save();

            session()->flash('message', 'Hospital Successfully Created');
            return redirect()->back();
        }else{
            session()->flash('message', 'Invalid User Reference');
            return redirect()->back();
        }
    }

    public function edit(Hospital $hospital)
    {
        //dd($hospital);
        $hospital->load(['phoneNumbers', 'specialities', 'premium']);
        $admin = Auth('admin')->user();
        $regions = Region::with('cities')->get();
        $regions = json_encode($regions);
        $specialities = HospitalSpeciality::all();
        return view('admin.hospital.editHospital', compact('admin', 'regions', 'specialities', 'hospital'));
    }

    public function update(Request $request)
    {
        
        $admin = Auth('admin')->user();

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
            'email' => 'nullable|email',
            'img' => 'image|nullable|mimes:jpeg,bmp,png|max:5000',
        ]);
        
        if ($request->id !== null) {
            $hospital = Hospital::where('id', $request->id)->first();
            $hospital->update([
                'admin_id' => $admin->id,
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
            ]);

            $hospital->specialities()->attach($request->speciality_id);

            if ($request->premium === "true") {
                $hospital->premium()->create([
                    'admin_id' => $admin->id,
                    'priority' => $request->priority,
                    'expires_at' => $request->expires_at,
                ]);
            }
            
            if (count($request->phones)) {
                $hospital->phoneNumbers()->delete();
                foreach ($request->phones as $phone) {
                    $hospital->phoneNumbers()->create([
                        'number' => $phone,
                    ]);
                }
            }

            if ($request->hasFile('img')) {
                $hospital->uploadImage($request->img);
            }

            $hospital->save();

            session()->flash('message', 'Hospital Successfully Updated');
            return redirect()->back();
        } else {
            session()->flash('message', 'Invalid');
            return redirect()->back();
        }
    }
}
