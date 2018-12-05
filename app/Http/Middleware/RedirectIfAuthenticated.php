<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

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
        if (Auth::guard($guard)->check()&& Auth::user()->role->id == 1) {
        Toastr::info(Auth::user()->name, 'Welcome Dashboard Admin ');

            return redirect()->route('admin.dashboard');
        }
        elseif (Auth::guard($guard)->check()&& Auth::user()->role->id == 2) {
            return redirect()->route('author.dashboard');
        }
        else{

            return $next($request);
        }
    }
}
