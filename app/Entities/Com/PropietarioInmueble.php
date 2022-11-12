<?php
namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PropietarioInmueble
 * @package InnovaCondomi\Entities\Com
 */
class PropietarioInmueble extends Model
{
    use SoftDeletes;
    public $table = 'com_propietario_inmueble';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'com_propietario_id',
        'com_inmueble_id',
        'com_tipo_propietario_id',
        'observacion',
        'activo', 'borrado',
        'vive_aqui',
        'contacto_principal',
        'no_aplica_cuota',
        'created_ip',
        'updated_ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'observacion' => 'string',
        'activo' => 'boolean',
        'vive_aqui' => 'boolean',
        'contacto_principal' => 'boolean',
        'no_aplica_cuota' => 'boolean',
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
        'com_propietario_id' => 'required',
        'com_inmueble_id' => 'required',
        'com_tipo_propietario_id' => 'required'
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
    public function inmueble()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Inmueble::class, 'com_inmueble_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function propietario()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Propietario::class, 'com_propietario_id', 'id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function tipoPropietario()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\TipoPropietario::class, 'com_tipo_propietario_id', 'id');
    }
}
