<?php

namespace InnovaCondomi\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use InnovaCondomi\Exceptions\ExcepcionRolDenegado;

class VerificarRol
{
    /**
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Crear una nueva instancia del filtro
     *
     * @param Guard|\Illuminate\Contracts\Auth\Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Manejar las peticiones entrantes.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param int|string $rol
     * @return mixed
     * @throws ExcepcionRolDenegado
     */
    public function handle($request, Closure $next, $rol)
    {
        if ($this->auth->check() && $this->auth->user()->is($rol)) {
            return $next($request);
        }
        throw new ExcepcionRolDenegado($rol);

    }
}
