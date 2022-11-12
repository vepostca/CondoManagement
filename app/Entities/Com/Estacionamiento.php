<?php
namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estacionamiento
 * @package InnovaCondomi\Entities\Com
 */
class Estacionamiento extends Model
{
    use SoftDeletes;
    public $table = 'com_estacionamiento';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'com_inmueble_id',
        'placa',
        'marca',
        'modelo',
        'color',
        'observaciones',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'placa' => 'string',
        'marca' => 'string',
        'modelo' => 'string',
        'color' => 'string',
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
        'com_inmueble_id' => 'required',
        'placa' => 'required|min:5|max:15',
        'marca' => 'required|min:2|max:50',
        'modelo' => 'min:2|max:50',
        'color' => 'min:2|max:50',
        'observaciones' => 'min:0|max:255'
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
}
