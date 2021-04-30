<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        // if (Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        // return $next($request);

        if(Auth::guard($guard)->check() && Auth::user()->status == '1' && Auth::user()->user_type == '1' && Auth::user()->is_approved == '1'){
            return redirect()->route('admin.dashboard');
        }
        elseif(Auth::guard($guard)->check() && Auth::user()->status == '1' && Auth::user()->user_type == '3' && Auth::user()->is_approved == '1'){
            return redirect()->route('client.dashboard');
        }
        elseif(Auth::guard($guard)->check() && Auth::user()->status == '1' && Auth::user()->user_type == '2' && Auth::user()->is_approved == '1'){
            return redirect()->route('worker.dashboard');
        }
        else{
            return $next($request);
        }
    }
}
