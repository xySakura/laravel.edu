<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth() -> check() || !auth()->user()->can('Admin-admin-index')){
                return redirect()->route('home');
        }

        return $next($request);
    }
}
