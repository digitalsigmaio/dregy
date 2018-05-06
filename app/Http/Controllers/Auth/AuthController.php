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
 *
 * @return Response
 */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }


    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function appHandleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        return response($user);
        /*$authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);*/
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'avatar' => $user->avatar,
            'ref_id' => Str::uuid()
        ]);
    }
}
