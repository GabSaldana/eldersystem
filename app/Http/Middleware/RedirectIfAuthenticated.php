<?php

namespace App\Http\Middleware;

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
        switch ($guard){
          case 'admin'://trying to access asa an admin
            if(Auth::guard($guard)->check()){//are an admin?
              return redirect()->route('admin.dashboard');
            }
            break;

          default:
            if(Auth::guard($guard)->check()){
                return redirect('/home');
            }
            break;
        }
        /*if (Auth::guard($guard)->check()) {//estamos logeados?
            return redirect('/home');
        }*/

        return $next($request);
    }
}
