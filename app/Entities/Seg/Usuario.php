<?php
namespace InnovaCondomi\Entities\Seg;

use InnovaCondomi\Entities\Base\Identifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use InnovaCondomi\Rasgos\TieneRolYPermiso;
use InnovaCondomi\Contratos\TieneRolYPermiso as ContratoTieneRolYPermiso;

class Usuario extends Identifiable implements
                                    AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract,
                                    ContratoTieneRolYPermiso
{
    use SoftDeletes,Authenticatable, Authorizable, CanResetPassword, TieneRolYPermiso;

    /**
     * Nombre de la tabla en la Base de Datos.
     *
     * @var string
     */
    protected $table = 'seg_usuario';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * Los atributos que son asignables en lote.
     *
     * @var array
     */
    protected $fillable = [
        'com_cliente_id', 'com_org_id', 'nombres', 'apellidos', 'username', 'email',
        'password', 'activo','created_by', 'created_ip', 'updated_by', 'updated_ip',
    ];

    /**
     * Atributos que deben estar ocultos para arrays
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNombreCompleto(){
        return $this->apellidos . ', ' . $this->nombres;
    }
}
