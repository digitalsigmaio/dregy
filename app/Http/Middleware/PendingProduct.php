<?php

namespace App\Http\Middleware;

use App\ProductAd;
use Closure;

class PendingProduct
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
        if (ProductAd::find((int) $matches[0])->approved !== null) {
            return redirect()->route('admin.products.review');
        }
        return $next($request);
    }
}
