<?php

namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Pais",
 *      required={"com_cliente_id", "com_org_id", "codigo_iso2", "codigo_iso3", "nombre"},
 *      @SWG\Property(
 *          property="codigo_iso2",
 *          description="codigo_iso2",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="codigo_iso3",
 *          description="codigo_iso3",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="codigo_telefonico",
 *          description="codigo_telefonico",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tiene_region",
 *          description="tiene_region",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="nombre_region",
 *          description="nombre_region",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="created_ip",
 *          description="created_ip",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_ip",
 *          description="updated_ip",
 *          type="string"
 *      )
 * )
 */
class Pais extends Model
{
    use SoftDeletes;
    public $table = 'com_pais';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'codigo_iso2',
        'codigo_iso3',
        'nombre',
        'descripcion',
        'codigo_telefonico',
        'tiene_region',
        'nombre_region',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo_iso2' => 'string',
        'codigo_iso3' => 'string',
        'nombre' => 'string',
        'descripcion' => 'string',
        'codigo_telefonico' => 'string',
        'tiene_region' => 'boolean',
        'nombre_region' => 'string',
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
        'codigo_iso2' => 'required|min:2|max:2',
        'codigo_iso3' => 'required|min:3|max:3',
        'nombre' => 'required|min:3|max:100',
        'codigo_telefonico' => 'min:2|max:6',
        'nombre_region' => 'min:2|max:100'
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
