<?php
namespace InnovaCondomi\Contratos;

use Illuminate\Database\Eloquent\Model;

interface TieneRolYPermiso
{
    /**
     * User belongs to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles();
    /**
     * Get all roles as collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRoles();
    /**
     * Check if the user has a role or roles.
     *
     * @param int|string|array $role
     * @param bool $all
     * @return bool
     */
    public function es($role, $all = false);
    /**
     * Check if the user has all roles.
     *
     * @param int|string|array $role
     * @return bool
     */
    public function esTodo($role);
    /**
     * Check if the user has at least one role.
     *
     * @param int|string|array $role
     * @return bool
     */
    public function esUn($role);
    /**
     * Check if the user has role.
     *
     * @param int|string $role
     * @return bool
     */
    public function tieneRol($role);
    /**
     * Attach role to a user.
     *
     * @param int|\InnovaCondomi\Entities\Seg\Rol $role
     * @return null|bool
     */
    public function adjuntarRol($role);
    /**
     * Detach role from a user.
     *
     * @param int|\InnovaCondomi\Entities\Seg\Rol $role
     * @return int
     */
    public function separarRol($role);
    /**
     * Detach all roles from a user.
     *
     * @return int
     */
    public function separarTodosRoles();
    /**
     * Get role level of a user.
     *
     * @return int
     */
    public function nivel();
    /**
     * Get all permissions from roles.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function rolPermisos();
    /**
     * User belongs to many permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarioPermisos();
    /**
     * Get all permissions as collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPermisos();
    /**
     * Check if the user has a permission or permissions.
     *
     * @param int|string|array $permission
     * @param bool $all
     * @return bool
     */
    public function puede($permission, $all = false);
    /**
     * Check if the user has all permissions.
     *
     * @param int|string|array $permission
     * @return bool
     */
    public function puedeTodo($permission);
    /**
     * Check if the user has at least one permission.
     *
     * @param int|string|array $permission
     * @return bool
     */
    public function puedeUn($permission);
    /**
     * Check if the user has a permission.
     *
     * @param int|string $permission
     * @return bool
     */
    public function tienePermiso($permission);
    /**
     * Check if the user is allowed to manipulate with entity.
     *
     * @param string $providedPermission
     * @param \Illuminate\Database\Eloquent\Model $entity
     * @param bool $owner
     * @param string $ownerColumn
     * @return bool
     */
    public function permitido($providedPermission, Model $entity, $owner = true, $ownerColumn = 'seg_usuario_id');
    /**
     * Attach permission to a user.
     *
     * @param int|\InnovaCondomi\Entities\Seg\Permiso $permission
     * @return null|bool
     */
    public function adjuntarPermiso($permission);
    /**
     * Detach permission from a user.
     *
     * @param int|\InnovaCondomi\Entities\Seg\Permiso $permission
     * @return int
     */
    public function separarPermiso($permission);
    /**
     * Detach all permissions from a user.
     *
     * @return int
     */
    public function separarTodosPermisos();
}