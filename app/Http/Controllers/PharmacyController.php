<?php

namespace App\Http\Controllers;

use App\Http\Resources\PharmacyResource;
use App\Pharmacy;
use App\Region;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


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
        $relatedPharmacies = PharmacyResource::collection($relatedPharmacies);
        $relatedPharmaciesChunks = $relatedPharmacies->chunk(3);
        $relatedPharmaciesChunks = json_encode($relatedPharmaciesChunks);

        $pharmacy = new PharmacyResource($pharmacy);
        $pharmacy = json_encode($pharmacy);

        return view('pharmacy', compact(['pharmacy', 'relatedPharmaciesChunks']));
    }

    //Admin Area
    public function list()
    {
        $admin = Auth('admin')->user();
        $account_url = '/api/pharmacies/search';
        $account_name = 'List Pharmacies';
        $delete_url = '/api/pharmacies/pharmacy/';
        $edit_url = '/admin/pharmacies/edit/';
        return view('admin.pharmacy.listPharmacy', compact('admin','account_url', 'account_name','delete_url', 'edit_url'));
    }

    public function create()
    {
        $admin = Auth('admin')->user();
        $regions = Region::with('cities')->get();
        return view('admin.pharmacy.newPharmacy', compact('admin', 'regions'));
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
            'email' => 'nullable|email',
            'img' => 'image|nullable|mimes:jpeg,bmp,png|max:5000',
            'ref_id' => 'required',
            'phones*' => "required",
        ]);

        //dd($request->all());
        $user = User::where('ref_id', $request->ref_id)->first();

        if ($user !== null) {
            $pharmacy = $user->pharmacies()->create([
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
                'full_time'=> (boolean) $request->full_time,
                'delivery' => (boolean) $request->delivery
            ]);

            if ($request->premium === 'true') {
                $pharmacy->premium()->create([
                'admin_id' => $admin->id,
                'priority' => $request->priority,
                'expires_at' => $request->expires_at,
            ]);
            }

            if (count($request->phones)) {
                foreach ($request->phones as $phone) {
                    $pharmacy->phoneNumbers()->create([
                        'number' => $phone,
                    ]);
                }
            }


            if ($request->hasFile('img')) {
                $pharmacy->uploadImage($request->img);
            }

            $pharmacy->save();

            session()->flash('message', 'Pharmacy Successfully Created');
            return redirect()->back();
        } else {
            session()->flash('message', 'Invalid User Reference');
            return redirect()->back();
        }

    }

    public function edit(Pharmacy $pharmacy)
    {
        $admin = Auth('admin')->user();
        $regions = Region::with('cities')->get();
        return view('admin.pharmacy.editPharmacy', compact('admin', 'regions', 'pharmacy'));
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
            $pharmacy = Pharmacy::where('id', $request->id)->first();
            $pharmacy->update([
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
                'full_time' => (boolean)$request->full_time,
                'delivery' => (boolean)$request->delivery
            ]);

            if ($request->premium === 'true') {
                $pharmacy->premium()->create([
                    'admin_id' => $admin->id,
                    'priority' => $request->priority,
                    'expires_at' => $request->expires_at,
                ]);
            }

            if (count($request->phones)) {
                $pharmacy->phoneNumbers()->delete();
                foreach ($request->phones as $phone) {
                    $pharmacy->phoneNumbers()->create([
                        'number' => $phone,
                    ]);
                }
            }

            if ($request->hasFile('img')) {
                $pharmacy->uploadImage($request->img);
            }

            if ($pharmacy->save()) {
                $admin = $request->user('admin');
                $admin->updatedProperty($pharmacy);

                session()->flash('message', 'Pharmacy Successfully Updated');
                return redirect()->back();
            }

        } else {
            session()->flash('message', 'Invalid Pharmacy User Ref');
            return redirect()->back();
        }

    }
    
}
