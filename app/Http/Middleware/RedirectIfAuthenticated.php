<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'admin':
                $redirect = route('admin.dashboard');
                break;
            default:
                $redirect = route('home');
        }

        if (Auth::guard($guard)->check()) {
            return redirect($redirect);
        }


        return $next($request);
    }
}
