<?php
  
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
   
class IsAdmin
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
        if(auth()->user()->user_type == 1 && Auth::user()->status == 1 && Auth::user()->is_approved == 1){
            return $next($request);
        }
        else{
            return redirect()->route('login');
        }
    }
}
