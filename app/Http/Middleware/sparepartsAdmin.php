<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class sparepartsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->isAdmin == 1){
            return $next($request);
        } else {
            // Redirect non-logged-in users to the login page
            return redirect()->route('login')->with('error', 'Unauthorized access. Please log in.');
        }
    }
}
