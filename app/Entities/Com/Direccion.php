<?php

namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;

/**
 * @SWG\Definition(
 *      definition="Direccion",
 *      required={"com_cliente_id", "com_org_id", "com_tipo_direccion_id", "linea_dir", "ciudad", "com_pais_id", "direccionable_id", "direccionable_type"},
 *      @SWG\Property(
 *          property="linea_dir",
 *          description="linea_dir",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ciudad",
 *          description="ciudad",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="apartado_postal",
 *          description="apartado_postal",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="es_principal",
 *          description="es_principal",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="latitud",
 *          description="latitud",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="longitud",
 *          description="longitud",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="direccionable_type",
 *          description="direccionable_type",
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
class Direccion extends Model
{

    public $table = 'com_direccion';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'com_tipo_direccion_id',
        'linea_dir',
        'ciudad',
        'apartado_postal',
        'com_pais_id',
        'com_region_id',
        'es_principal',
        'latitud',
        'longitud',
        'direccionable_id',
        'direccionable_type',
        'activo','borrado','created_ip','updated_ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'linea_dir' => 'string',
        'ciudad' => 'string',
        'apartado_postal' => 'string',
        'es_principal' => 'boolean',
        'direccionable_type' => 'string',
        'activo' => 'boolean', 'borrado' =>'boolean',
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
        'com_tipo_direccion_id' => 'required',
        'linea_dir' => 'required|min:2|max:200',
        'ciudad' => 'required|min:2|max:100',
        'apartado_postal' => 'min:2|max:20',
        'com_pais_id' => 'required',
        'latitud' => 'numeric',
        'longitud' => 'numeric',
        'direccionable_id' => 'required',
        'direccionable_type' => 'required'
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
    public function tipoDireccion()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\TipoDireccion::class, 'com_tipo_direccion_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pais()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Pais::class, 'com_pais_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function region()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Region::class, 'com_region_id', 'id');
    }

    /**
     * Obtener los modelos direccionables.
     */
    public function direccionable()
    {
        return $this->morphTo();
    }
}
