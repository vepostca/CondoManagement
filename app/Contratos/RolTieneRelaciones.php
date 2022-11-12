<?php
namespace InnovaCondomi\Contratos;

interface RolTieneRelaciones
{
    /**
     * Rol pertenece a muchos permisos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permisos();
    /**
     * Rol pertenece a muchos usuarios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios();
    /**
     * Rol pertenece a muchas Org
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function organizaciones();
    /**
     * Adjuntar un permiso a un rol.
     *
     * @param string|\InnovaCondomi\Entities\Seg\Permiso $permiso
     * @return string|bool
     */
    public function adjuntarPermiso($permiso);
    /**
     * Separar un Permiso de un Rol.
     *
     * @param string|\InnovaCondomi\Entities\Seg\Permiso $permiso
     * @return string
     */
    public function separarPermiso($permiso);
    /**
     * Separar todos los permisos.
     *
     * @return int
     */
    public function separarTodosPermisos();
}