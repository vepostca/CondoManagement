<?php
namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;

/**
 * @SWG\Definition(
 *      definition="Telefono",
 *      required={"com_cliente_id", "com_org_id", "com_tipo_telefono_id", "codigo_area", "num_telf", "com_pais_id", "telefoneable_id", "telefoneaable_type"},
 *      @SWG\Property(
 *          property="codigo_area",
 *          description="codigo_area",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="num_telf",
 *          description="num_telf",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="es_principal",
 *          description="es_principal",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="telefoneable_type",
 *          description="telefoneable_type",
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
class Telefono extends Model
{
    public $table = 'com_telefono';

    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'com_tipo_telefono_id',
        'codigo_area',
        'num_telf',
        'es_principal',
        'notas',
        'telefoneable_id',
        'telefoneable_type',
        'activo','borrado','created_ip','updated_ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo_area' => 'string',
        'num_telf' => 'string',
        'es_principal' => 'boolean',
        'telefoneable_id' => 'string',
        'telefoneable_type' => 'string',
        'activo' => 'boolean', 'borrado' => 'boolean',
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
        'com_tipo_telefono_id' => 'required',
        'codigo_area' => 'required|min:2|max:4',
        'num_telf' => 'required|min:3|max:10',
        'telefoneable_id' => 'required',
        'telefoneable_type' => 'required'
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
    public function tipoTelefono()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\TipoTelefono::class, 'com_tipo_telefono_id', 'id');
    }

    /**
     * Obtener los modelos telefoneables.
     */
    public function telefoneable()
    {
        return $this->morphTo();
    }
}
