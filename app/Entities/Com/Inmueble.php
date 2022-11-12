<?php

namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Inmueble",
 *      required={"com_cliente_id", "com_org_id", "com_division_id", "com_tipo_inmueble_id", "codigo", "nombre", "coeficiente", "area"},
 *      @SWG\Property(
 *          property="codigo",
 *          description="codigo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="coeficiente",
 *          description="coeficiente",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="area",
 *          description="area",
 *          type="number",
 *          format="float"
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
class Inmueble extends Model
{
    use SoftDeletes;
    public $table = 'com_inmueble';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'com_division_id',
        'com_tipo_inmueble_id',
        'codigo',
        'nombre',
        'coeficiente',
        'area',
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
        'com_division_id' => 'required',
        'com_tipo_inmueble_id' => 'required',
        'codigo' => 'required|min:2|max:10',
        'nombre' => 'required|min:2|max:100',
        'coeficiente' => 'required',
        'area' => 'required'
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
    public function division()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Division::class, 'com_division_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoInmueble()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\TipoInmueble::class, 'com_tipo_inmueble_id', 'id');
    }
}
