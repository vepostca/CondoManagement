<?php
namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Instalacion
 * @package InnovaCondomi\Entities\Com
 */
class Instalacion extends Model
{
    use SoftDeletes;
    public $table = 'com_instalacion';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre','descripcion',
        'costo',
        'reserva_morosos',
        'com_fondo_id',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
        'reserva_morosos' => 'boolean',
        'hora_inicio' => 'time',
        'hora_fin' => 'time',
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
        'nombre' => 'required|min:2|max:100',
        'costo' => 'required|numeric',
        'hora_inicio' => 'required',
        'hora_fin' => 'required',
        'com_fondo_id' => 'required'
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
    public function fondo()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Fondo::class, 'com_fondo_id', 'id');
    }
}
