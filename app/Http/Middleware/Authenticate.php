<?php

namespace InnovaCondomi\Http\Middleware;

use Closure;
use InnovaCondomi\Clases\LoginUtils;
use Illuminate\Support\Facades\Auth;
use Session;

class Authenticate
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

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }else{
            if (Auth::check() && !LoginUtils::contextoApIniciado())
            {
                return redirect('/loginrol');
            }
        }

        return $next($request);
    }
}
