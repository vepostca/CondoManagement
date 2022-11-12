<?php
namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CuentaBanco
 * @package InnovaCondomi\Entities\Com
 */
class CuentaBanco extends Model
{
    use SoftDeletes;
    public $table = 'com_cuenta_banco';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre',
        'com_tipo_cuenta_banco_id',
        'com_entidad_bancaria_id',
        'num_cuenta',
        'saldo_inicial',
        'fecha_saldo_inicial',
        'saldo_actual',
        'fecha_saldo_actual',
        'observaciones',
        'activo',
        'created_by',
        'created_at',
        'created_ip',
        'updated_by',
        'updated_at',
        'updated_ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'nombre' => 'string',
        'num_cuenta' => 'string',
        'fecha_saldo_inicial' => 'datetime',
        'fecha_saldo_actual' => 'datetime',
        'observaciones' => 'string',
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
        'nombre' => 'required|min:2|max:60',
        'com_tipo_cuenta_banco_id' => 'required',
        'num_cuenta' => 'min:5|max:30',
        'saldo_inicial' => 'numeric',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoCuentaBanco()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\TipoCuentaBanco::class,
            'com_tipo_cuenta_banco_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function entidadBancaria()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\EntidadBancaria::class,
            'com_entidad_bancaria_id', 'id');
    }
}
