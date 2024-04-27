<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\AccountType;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (request()->user('account')->account_type_id != AccountType::CUSTOMER) {
            abort(403);
        }
        return $next($request);
    }
}
