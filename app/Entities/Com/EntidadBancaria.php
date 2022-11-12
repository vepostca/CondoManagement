<?php
namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EntidadBancaria
 * @package InnovaCondomi\Entities\Com
 */
class EntidadBancaria extends Model
{
    use SoftDeletes;
    public $table = 'com_entidad_bancaria';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre',
        'siglas',
        'descripcion',
        'activo',
        'created_ip',
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
        'siglas' => 'string',
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
        'nombre' => 'required|min:2|max:150',
        'siglas' => 'min:2|max:20'
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
