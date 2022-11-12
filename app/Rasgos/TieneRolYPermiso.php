<?php
namespace InnovaCondomi\Rasgos;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

trait TieneRolYPermiso
{
    /**
     * Propiedad para tener en caché los roles.
     *
     * @var \Illuminate\Database\Eloquent\Collection|null
     */
    protected $roles;
    /**
     * Propiedad para tener en caché los permisos.
     *
     * @var \Illuminate\Database\Eloquent\Collection|null
     */
    protected $permisos;

    /**
     * Usuario tiene uno o muchos roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('rbac.modelos.rol'),'seg_rol_usuario','seg_usuario_id','seg_rol_id')
            ->withPivot('com_cliente_id', 'com_org_id', 'activo', 'borrado', 'deleted_at',
                'created_by', 'created_at', 'created_ip',
                'updated_by', 'updated_at', 'updated_ip');
    }

    /**
     * Obtener todos los roles como una Colección
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRoles()
    {
        return (!$this->roles) ? $this->roles = $this->roles()->get() : $this->roles;
    }

    /**
     * Chequear si el usuario tiene uno o varios roles
     *
     * @param string|array $rol
     * @param bool $todo
     * @return bool
     */
    public function es($rol, $todo = false)
    {
        if ($this->esSimulacionActivado()) {
            return $this->simular('es');
        }
        return $this->{$this->getNombreMetodo('es', $todo)}($rol);
    }

    /**
     * Chequear si el usuario tiene por lo menos un rol
     *
     * @param string|array $rol
     * @return bool
     */
    public function esUn($rol)
    {
        foreach ($this->getArrayFrom($rol) as $rol) {
            if ($this->tieneRol($rol)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Chequear si el usuario tiene todos los roles.
     *
     * @param string|array $rol
     * @return bool
     */
    public function esTodo($rol)
    {
        foreach ($this->getArrayFrom($rol) as $rol) {
            if (!$this->tieneRol($rol)) {
                return false;
            }
        }
        return true;
    }
    /**
     * Chequear si el usuario tiene un rol
     *
     * @param string $rol
     * @return bool
     */
    public function tieneRol($rol)
    {
        return $this->getRoles()->contains(function ($key, $value) use ($rol) {
            return $rol == $value->id || Str::is($rol, $value->slug);
        });
    }

    /**
     * Agregar un rol a un usuario
     *
     * @param string|\InnovaCondomi\Entities\Seg\Rol $rol
     * @return null|bool
     */
    public function adjuntarRol($rol)
    {
        return (!$this->getRoles()->contains($rol)) ? $this->roles()->attach($rol) : true;
    }

    /**
     * Separar un rol de un usuario.
     *
     * @param string|\InnovaCondomi\Entities\Seg\Rol $rol
     * @return string
     */
    public function separarRol($rol)
    {
        $this->roles = null;
        return $this->roles()->detach($rol);
    }

    /**
     * Separar todos los roles de un usuario
     *
     * @return string
     */
    public function separarTodosRoles()
    {
        $this->roles = null;
        return $this->roles()->detach();
    }

    /**
     * Obtener el nivel del rol asociado a un usuario
     *
     * @return int
     */
    public function nivel()
    {
        return ($rol = $this->getRoles()->sortByDesc('nivel_jerarquia')->first()) ? $rol->nivel_jerarquia : 0;
    }

    /**
     * Obtener todos los permisos de roles
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function rolPermisos()
    {
        $permissionModel = app(config('rbac.modelos.permiso'));
        if (!$permissionModel instanceof Model) {
            throw new InvalidArgumentException('[rbac.modelos.permiso] debe ser una instancia de \Illuminate\Database\Eloquent\Model');
        }
        return $permissionModel::select(['seg_permiso.*', 'seg_permiso_rol.created_at as pivot_created_at',
            'seg_permiso_rol.updated_at as pivot_updated_at'])
            ->join('seg_permiso_rol', 'permiso_rol.seg_permiso_id', '=', 'seg_permiso.id')
            ->join('seg_rol', 'seg_rol.id', '=', 'seg_permiso_rol.seg_rol_id')
            ->whereIn('seg_rol.id', $this->getRoles()->lists('id')->toArray())
            ->orWhere('seg_rol.nivel_jerarquia', '<', $this->nivel())
            ->groupBy(['seg_permiso.id', 'pivot_created_at', 'pivot_updated_at']);
    }
    /**
     * Usuario pertenece a muchos permisos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarioPermisos()
    {
        return $this->belongsToMany(config('rbac.modelos.permiso'),
            'seg_permiso_usuario', 'seg_usuario_id', 'seg_permiso_id')
            ->withPivot('com_cliente_id', 'com_org_id', 'activo', 'borrado', 'deleted_at',
                'created_by', 'created_at', 'created_ip',
                'updated_by', 'updated_at', 'updated_ip');
    }

    /**
     * Obtener todos los permisos como Colección
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPermisos()
    {
        return (!$this->permisos) ?
            $this->permisos = $this->rolPermisos()->get()->merge($this->usuarioPermisos()->get())
            : $this->permisos;
    }

    /**
     * Chequear si el usuario tiene uno o varios permisos.
     *
     * @param string|array $permiso
     * @param bool $todo
     * @return bool
     */
    public function puede($permiso, $todo = false)
    {
        if ($this->esSimulacionActivado()) {
            return $this->simular('puede');
        }
        return $this->{$this->getNombreMetodo('puede', $todo)}($permiso);
    }
    /**
     * Chequear si el usuario tiene por lo menos un permiso
     *
     * @param string|array $permiso
     * @return bool
     */
    public function puedeUn($permiso)
    {
        foreach ($this->getArrayFrom($permiso) as $permiso) {
            if ($this->tienePermiso($permiso)) {
                return true;
            }
        }
        return false;
    }
    /**
     * Chequear si el usuario tiene todos los permisos
     *
     * @param string|array $permiso
     * @return bool
     */
    public function puedeTodo($permiso)
    {
        foreach ($this->getArrayFrom($permiso) as $permiso) {
            if (!$this->tienePermiso($permiso)) {
                return false;
            }
        }
        return true;
    }
    /**
     * Chequear si el usuario tiene un permiso
     *
     * @param string $permission
     * @return bool
     */
    public function tienePermiso($permiso)
    {
        return $this->getPermisos()->contains(function ($key, $value) use ($permiso) {
            return $permiso == $value->id || Str::is($permiso, $value->slug);
        });
    }
    /**
     * Chequear si el usuario tiene permitido manipular la Entidad
     *
     * @param string $permisoPrevisto
     * @param \Illuminate\Database\Eloquent\Model $entidad
     * @param bool $propietario
     * @param string $columnaPropietaria
     * @return bool
     */
    public function permitido($permisoPrevisto, Model $entidad,
                              $propietario = true, $columnaPropietaria = 'seg_usuario_id')
    {
        if ($this->esSimulacionActivado()) {
            return $this->simular('permitido');
        }
        if ($propietario === true && $entidad->{$columnaPropietaria} == $this->id) {
            return true;
        }
        return $this->esPermitido($permisoPrevisto, $entidad);
    }
    /**
     * Comprobar si el usuario está autorizado para manipular la entidad proporcionada.
     *
     * @param string $permisoPrevisto
     * @param \Illuminate\Database\Eloquent\Model $entidad
     * @return bool
     */
    protected function esPermitido($permisoPrevisto, Model $entidad)
    {
        foreach ($this->getPermisos() as $permiso) {
            if ($permiso->model != '' && get_class($entidad) == $permiso->model
                && ($permiso->id == $permisoPrevisto || $permiso->slug === $permisoPrevisto)
            ) {
                return true;
            }
        }
        return false;
    }
    /**
     * Adjuntar permiso a un usuario.
     *
     * @param int|\InnovaCondomi\Entities\Seg\Permiso $permiso
     * @return null|bool
     */
    public function adjuntarPermiso($permiso)
    {
        return (!$this->getPermisos()->contains($permiso)) ? $this->usuarioPermisos()->attach($permiso) : true;
    }
    /**
     * Separar el permiso de un usuario.
     *
     * @param string|\InnovaCondomi\Entities\Seg\Permiso $permiso
     * @return int
     */
    public function separarPermiso($permiso)
    {
        $this->permisos = null;
        return $this->usuarioPermisos()->detach($permiso);
    }
    /**
     * Separar todos los permisos de un usuario.
     *
     * @return int
     */
    public function separarTodosPermisos()
    {
        $this->permisos = null;

        return $this->usuarioPermisos()->detach();
    }
    /**
     * Comprobar si la opción de simulación está habilitado.
     *
     * @return bool
     */
    private function esSimulacionActivado()
    {
        return (bool) config('rbac.simular.activado');
    }
    /**
     * Allows to pretend or simulate package behavior.
     * Permite fingir o simular el comportamiento del paquete.
     *
     * @param string $opcion
     * @return bool
     */
    private function simular($opcion)
    {
        return (bool) config('rbac.simular.opciones.' . $opcion);
    }
    /**
     * Get method name.
     * Obtener el nombre del método
     *
     * @param string $nombreMetodo
     * @param bool $todo
     * @return string
     */
    private function getNombreMetodo($nombreMetodo, $todo)
    {
        return ((bool) $todo) ? $nombreMetodo . 'Todo' : $nombreMetodo . 'Un';
    }
    /**
     * Get an array from argument.
     * Obtener un arreglo desde el argumento.
     *
     * @param int|string|array $argumento
     * @return array
     */
    private function getArrayFrom($argumento)
    {
        return (!is_array($argumento)) ? preg_split('/ ?[,|] ?/', $argumento) : $argumento;
    }
    /**
     * Handle dynamic method calls.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (starts_with($method, 'es')) {
            return $this->es(snake_case(substr($method, 2), config('rbac.separador')));
        } elseif (starts_with($method, 'puede')) {
            return $this->puede(snake_case(substr($method, 5), config('rbac.separador')));
        } elseif (starts_with($method, 'permitido')) {
            return $this->permitido(snake_case(substr($method, 9), config('rbac.separador')),
                                  $parameters[0],
                                  (isset($parameters[1])) ? $parameters[1] : true,
                                  (isset($parameters[2])) ? $parameters[2] : 'seg_usuario_id');
        }
        return parent::__call($method, $parameters);
    }
}
