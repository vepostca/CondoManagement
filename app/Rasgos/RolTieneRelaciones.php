<?php
namespace InnovaCondomi\Rasgos;

trait RolTieneRelaciones
{
    /**
     * Rol pertenece a muchos permisos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permisos()
    {
        return $this->belongsToMany(config('rbac.modelos.permiso'),'seg_permiso_rol','seg_rol_id','seg_permiso_id')
            ->withPivot('com_cliente_id', 'com_org_id', 'activo', 'borrado', 'deleted_at',
                        'created_by', 'created_at', 'created_ip',
                        'updated_by', 'updated_at', 'updated_ip');
    }
    /**
     * Rol pertenece a muchos usuarios.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios()
    {
        return $this->belongsToMany(config('auth.providers.users.model'),'seg_rol_usuario','seg_rol_id','seg_usuario_id')
            ->withPivot('com_cliente_id', 'com_org_id', 'activo', 'borrado', 'deleted_at',
                        'created_by', 'created_at', 'created_ip',
                        'updated_by', 'updated_at', 'updated_ip');
    }
    /**
     * Rol pertenece a muchas Org
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function organizaciones()
    {
        return $this->belongsToMany(config('rbac.modelos.org'),'seg_org_rol','seg_rol_id','com_org_id')
            ->where('com_org.activo','=',1)
            ->withPivot('com_cliente_id', 'com_org_id', 'es_solo_lectura', 'activo', 'borrado', 'deleted_at',
                'created_by', 'created_at', 'created_ip',
                'updated_by', 'updated_at', 'updated_ip')
            ->wherePivot('activo','=',1);
    }
    /**
     * Adjuntar Permiso a un Rol.
     *
     * @param string|\InnovaCondomi\Entities\Seg\Permiso $permiso
     * @return string|bool
     */
    public function adjuntarPermiso($permiso)
    {
        return (!$this->permisos()->get()->contains($permiso))
            ? $this->permisos()->attach($permiso) : true;
    }
    /**
     * Separar Permiso de un Rol.
     *
     * @param string|\InnovaCondomi\Entities\Seg\Permiso $permiso
     * @return string
     */
    public function separarPermiso($permiso)
    {
        return $this->permisos()->detach($permiso);
    }
    /**
     * Separar todos los Permisos.
     *
     * @return string
     */
    public function separarTodosPermisos()
    {
        return $this->permisos()->detach();
    }
}