<?php

namespace InnovaCondomi\Http\Middleware;

use Closure;
use InnovaCondomi\Clases\LoginUtils;
use Illuminate\Support\Facades\Auth;

class LoginRol
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
        /*if (!LoginUtils::contextoApIniciado()){
            dd('Middleware loginrol');
            return redirect('/loginrol');
        }*/
        return $next($request);
    }
}
