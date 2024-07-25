<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is a company
        if (Auth::check() && Auth::user()->is_company) {
            return $next($request);
        }

        // Redirect or abort if not a company
        return redirect('/')->with('error', 'You do not have access to this resource.');
    }
}
