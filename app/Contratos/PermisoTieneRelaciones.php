<?php
namespace InnovaCondomi\Contratos;

interface PermisoTieneRelaciones
{
    /**
     * Permiso pertenece a muchos roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles();
    /**
     * Permiso pertenece a muchos Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios();
}