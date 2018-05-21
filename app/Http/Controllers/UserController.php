<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function favoriteHospitals(User $user)
    {
        $favorites = $user->favoriteHospitals;

        return response()->json($favorites);
    }

    public function favoriteClinics(User $user)
    {
        $favorites = $user->favoriteClinics;

        return response()->json($favorites);
    }

    public function favoriteCosmeticClinics(User $user)
    {
        $favorites = $user->favoriteCosmeticClinics;

        return response()->json($favorites);
    }

    public function favoritePharmacies(User $user)
    {
        $favorites = $user->favoritePharmacies;

        return response()->json($favorites);
    }

    public function favoriteProducts(User $user)
    {
        $favorites = $user->favoriteProductAds;

        return response()->json($favorites);
    }

    public function favoriteJobs(User $user)
    {
        $favorites = $user->favoriteJobAds;

        return response()->json($favorites);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = Auth::user();
        if( !empty($request->newPassword) ) {
            $request->validate([
                'oldPassword' => 'required',
                'newPassword' => 'required|string|min:6'
            ]);
            if ( !empty($request->oldPassword) ) {
                if(Hash::check($request->oldPassword, $user->password)) {
                    $user->password = Hash::make($request->newPassword);
                } else {
                    return redirect()->back()->withErrors(['oldPassword' => 'Invalid old password']);
                }
            }
        }
        $user->name = $request->name;
        $user->email = $request->email;

        try {
            $user->save();

            session()->flash('success', 'Account has been updated');
            return redirect()->route('home');
        } catch (QueryException $e) {
            session()->flash('fail', 'Failed to update account');
            return redirect()->back();
        }
    }
}
