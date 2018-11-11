<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;
use League\Flysystem\Exception;

class AdminUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admin = Auth('admin')->user();
        return view('admin.user.info', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $admin = Auth('admin')->user();
        return view('admin.user.create', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ref_id)
    {
        //
        $admin = Auth('admin')->user();
        $userRelations = ['hospitals', 'clinics', 'pharmacies',
                        'beautyCenters', 'productAds', 'favorites',
                        'favoriteHospitals', 'favoriteClinics', 'favoriteCosmeticClinics',
                        'favoritePharmacies', 'favoriteProductAds', 'favoriteJobAds',
                        'views', 'rates', 'rateForHospitals', 'rateForClinics', 
                        'rateForPharmacies', 'rateForCosmeticClinics', 'deviceTokens'];
        $user = User::with($userRelations)->where('ref_id', $ref_id)->first();
        //$user = new UserResource($user);

        return view('admin.user.edit', compact('admin', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        //
        //dd($user);
        $request->validate([
            'name' => 'required|string|max:255',
            ]);
        
        /*
        if($request->has('password')){
            $request->validate([
            'password' => 'required|string|min:6|confirmed',
            ]);
            $user->password = bcrypt($request->password);
        }
        */

        if($request->has('email') & $request->email != $user->email){
            $request->validate([
            'email' => 'required|string|email|unique:users|max:255',
            ]);
            $user->password = bcrypt($request->password);
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        session()->flash('message','User Successfully Updated');
        
        return redirect()->back();

    }


    /**
     * @param string $ref_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $ref_id)
    {
        $user = User::where('ref_id', $ref_id)->first();

        if ($user !== null) {
            try {
                $user->delete();

                return response()->json('User has been deleted successfully', 204);
            } catch (\Exception $e) {

                return response()->json('Server error', $e->getCode());

            }
        } else {
            return response()->json('User not found', 404);
        }


    
    }
}
