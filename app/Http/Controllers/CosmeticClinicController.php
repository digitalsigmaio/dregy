<?php

namespace App\Http\Controllers;

use App\CosmeticClinic;
use App\CosmeticClinicSpeciality;
use App\Http\Resources\CosmeticClinicResource;
use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CosmeticClinicController extends Controller
{
    public function index()
    {

        $regions = Region::with('cities')->get();
        $specialities = CosmeticClinicSpeciality::all();
        $filters = collect([
            'regions' => $regions,
            'specialities' => $specialities,
        ]);

        return view('cosmetics', compact(['filters']));
    }

    public function show(CosmeticClinic $cosmeticClinic, $slug){
        $relatedCosmeticClinics = $cosmeticClinic->specialities()->first()->cosmeticClinics()->inrandomOrder()->take(9)->get();
        $relatedCosmeticClinics = $relatedCosmeticClinics->reject(function ($item) use ($cosmeticClinic) {
            return $item->id == $cosmeticClinic->id;
        });
        $relatedCosmeticClinics = CosmeticClinicResource::collection($relatedCosmeticClinics);
        $relatedCosmeticClinicsChunks = $relatedCosmeticClinics->chunk(3);
        $relatedCosmeticClinicsChunks = json_encode($relatedCosmeticClinicsChunks);
        $cosmetic = new CosmeticClinicResource($cosmeticClinic);
        $cosmetic = json_encode($cosmetic);

        return view('cosmetic', compact(['cosmetic', 'relatedCosmeticClinicsChunks']));
    }

    //Admin Area
    public function list()
    {
        $admin = Auth('admin')->user();
        $account_url = '/api/cosmetic-clinics/search';
        $account_name = 'List CosmeticClinics';
        $delete_url = '/api/cosmetic-clinics/cosmetic-clinic/';
        $edit_url = '/admin/cosmetic-clinics/edit/';
        return view('admin.cosmetic.listCosmeticClinic', compact('admin','url', 'account_name','account_url','delete_url', 'edit_url'));
    }

    public function create()
    {
        $admin = Auth('admin')->user();
        $regions = Region::with('cities')->get();
        $specialities = CosmeticClinicSpeciality::all();
        return view('admin.cosmetic.newCosmetic', compact('admin', 'regions', 'specialities'));
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
            'speciality_id'=> 'required',
            'phones*' => "required",
        ]);

        $user = User::where('ref_id', $request->ref_id)->first();

        if($user !==null)
        {
            $cosmetic = $user->beautyCenters()->create([
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
            
            $cosmetic->specialities()->attach($request->speciality_id);

            if (count($request->phones)) {
                foreach ($request->phones as $phone) {
                    $cosmetic->phoneNumbers()->create([
                        'number' => $phone,
                    ]);
                }
            }

            if ($request->premium === 'true') {
                $cosmetic->premium()->create([
                    'admin_id' => $admin->id,
                    'priority' => $request->priority,
                    'expires_at' => $request->expires_at,
                ]);
            }
            
            if($request->hasFile('img')){
                $cosmetic->uploadImage($request->img);
            }

            $cosmetic->save();

            session()->flash('message', 'Cosmetic Successfully Created');
            return redirect()->back();
        }else {
            session()->flash('message', 'Invalid User Reference');
            return redirect()->back();
        }
    }

    public function edit(CosmeticClinic $cosmeticClinic)
    {
        $cosmeticClinic->load(['specialities']);
        $admin = Auth('admin')->user();
        $regions = Region::with('cities')->get();
        $specialities = CosmeticClinicSpeciality::all();
        return view('admin.cosmetic.editCosmeticClinic', compact('admin', 'regions', 'specialities', 'cosmeticClinic'));
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
            'speciality_id' => 'required'
        ]);

        $user = User::where('ref_id', $request->ref_id)->first();

        if ($request->id !== null) {
            $cosmetic = CosmeticClinic::where('id', $request->id)->first();
            $cosmetic->update([
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

            $cosmetic->specialities()->attach($request->speciality_id);

            if ($request->premium === "true") {
                $cosmetic->premium()->create([
                    'admin_id' => $admin->id,
                    'priority' => $request->priority,
                    'expires_at' => $request->expires_at,
                ]);
            }

            if (count($request->phones)) {
                $cosmetic->phoneNumbers()->delete();
                foreach ($request->phones as $phone) {
                    $cosmetic->phoneNumbers()->create([
                        'number' => $phone,
                    ]);
                }
            }

            if ($request->hasFile('img')) {
                $cosmetic->uploadImage($request->img);
            }

            $cosmetic->save();

            session()->flash('message', 'Cosmetic Successfully Updated');
            return redirect()->back();
        } else {
            session()->flash('message', 'Invalid');
            return redirect()->back();
        }
    }
}
