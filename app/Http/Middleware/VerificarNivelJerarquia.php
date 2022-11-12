<?php
namespace InnovaCondomi\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use InnovaCondomi\Exceptions\ExcepcionNivelJerarquicoDenegado;

class VerificarNivelJerarquia
{
    /**
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * Crear una nueva instancia del filtro
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
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
     * @param int $level
     * @return mixed
     * @throws ExcepcionNivelJerarquicoDenegado
     */
    public function handle($request, Closure $next, $nivel)
    {
        if ($this->auth->check() && $this->auth->user()->level() >= $nivel) {
            return $next($request);
        }
        throw new ExcepcionNivelJerarquicoDenegado($nivel);
    }
}
