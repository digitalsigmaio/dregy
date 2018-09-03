<?php

namespace App\Http\Middleware;

use App\JobAd;
use Closure;

class PendingJob
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        preg_match('/[0-9]{1,9}$/', $request->getPathInfo(), $matches);
        if (JobAd::find((int) $matches[0])->approved !== null) {
            return redirect()->route('admin.jobs.review');
        }
        return $next($request);
    }
}
