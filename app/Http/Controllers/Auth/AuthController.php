<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    protected $redirectTo = '/home';


    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
 * Obtain the user information from provider.  Check if the user already exists in our
 * database by looking up their provider_id in the database.
 * If the user exists, log them in. Otherwise, create a new user then log them in. After that
 * redirect them to the authenticated users homepage.
 * @param $provider
 * @return Response
 */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        //return response()->json($user);
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect()->intended($this->redirectTo);
    }


    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     * @param Request $request
     * @return object
     */
    public function appHandleProviderCallback(Request $request)
    {
        $authUser = $this->findOrCreateUser($request, 'facebook');
        Auth::login($authUser, true);
        return $authUser;
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($request, $provider)
    {
        $authUser = User::where('provider_id', $request->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'provider' => $provider,
            'provider_id' => $request->id,
            'avatar' => $request->avatar,
            'ref_id' => strtolower(str_random(10))
        ]);
    }
}
