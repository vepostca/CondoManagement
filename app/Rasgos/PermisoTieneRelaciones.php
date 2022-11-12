<?php
namespace InnovaCondomi\Rasgos;

trait PermisoTieneRelaciones
{
    /**
     * Permiso pertenece a muchos roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('rbac.models.role'),'seg_permiso_rol','seg_permiso_id','seg_rol_id')
            ->withPivot('com_cliente_id', 'com_org_id', 'activo', 'borrado', 'deleted_at',
                'created_by', 'created_at', 'created_ip',
                'updated_by', 'updated_at', 'updated_ip');
    }
    /**
     * Permiso pertenece a muchos Usuarios
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios()
    {
        return $this->belongsToMany(config('auth.providers.users.model'),
            'seg_permiso_usuario','seg_permiso_id','seg_usuario_id')
            ->withPivot('com_cliente_id', 'com_org_id', 'activo', 'borrado', 'deleted_at',
                'created_by', 'created_at', 'created_ip',
                'updated_by', 'updated_at', 'updated_ip');
    }
}