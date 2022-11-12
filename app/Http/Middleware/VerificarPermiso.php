<?php

namespace InnovaCondomi\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use InnovaCondomi\Exceptions\ExcepcionPermisoDenegado;

class VerificarPermiso
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
     * @param int|string $permiso
     * @return mixed
     * @throws ExcepcionPermisoDenegado
     */
    public function handle($request, Closure $next, $permiso)
    {
        if ($this->auth->check() && $this->auth->user()->can($permiso)) {
            return $next($request);
        }
        throw new ExcepcionPermisoDenegado($permiso);
    }
}
