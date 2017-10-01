<?php

namespace App\Http\Middleware;
use \Illuminate\Contracts\Auth\Guard;
use Closure;
use Auth;

class Admin
{

    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('admin')){
            return $next($request);//si el usuario autentificado es admin prosigue
        }else{

          abort(401);
          //dd("no puedes acceder porque eres tipo usuario general");
        }
        //dd($this->auth->user()->admin());

    }
}
