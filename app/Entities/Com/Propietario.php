<?php
namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Propietario
 * @package InnovaCondomi\Entities\Com
 */
class Propietario extends Model
{
    use SoftDeletes;
    public $table = 'com_propietario';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public $fillable = [
        'com_cliente_id', 'com_org_id', 'codigo',
        'cedula_rif', 'nombres', 'apellidos', 'fecha_ingreso', 'fecha_egreso',
        'descripcion', 'activo', 'created_ip', 'updated_ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'cedula_rif' => 'string',
        'nombres' => 'string',
        'apellidos' => 'string',
        'fecha_ingreso' => 'date',
        'fecha_egreso' => 'date',
        'descripcion' => 'string',
        'activo' => 'boolean',
        'created_ip' => 'string',
        'updated_ip' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'com_cliente_id' => 'required',
        'com_org_id' => 'required',
        'codigo' => 'required|min:2|max:10',
        'cedula_rif' => 'required|min:2|max:20',
        'nombres' => 'required|min:2|max:60',
        'apellidos' => 'required|min:2|max:60',
        'fecha_ingreso' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Cliente::class, 'com_cliente_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function org()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Org::class, 'com_org_id', 'id');
    }
}
