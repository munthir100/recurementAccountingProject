<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedToDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request)  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check("web")) {
            return redirect()->route('user.dashboard.index');
        }

        return $next($request);
    }
}
