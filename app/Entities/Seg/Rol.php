<?php

namespace InnovaCondomi\Entities\Seg;

use InnovaCondomi\Entities\Base\Identifiable;
use InnovaCondomi\Rasgos\Slugable;
use InnovaCondomi\Entities\Com\Cliente;
use InnovaCondomi\Entities\Com\Org;
use Illuminate\Database\Eloquent\SoftDeletes;
use InnovaCondomi\Rasgos\RolTieneRelaciones;
use InnovaCondomi\Contratos\RolTieneRelaciones as ContratoRolTieneRelaciones;


/**
 * @SWG\Definition(
 *      definition="Rol",
 *      required={"com_cliente_id", "com_org_id", "nombre", "slug", "nivel_jerarquia", "nivel_acceso"},
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nivel_jerarquia",
 *          description="nivel_jerarquia",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nivel_acceso",
 *          description="nivel_acceso",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="borrado",
 *          description="borrado",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
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
class Rol extends Identifiable implements ContratoRolTieneRelaciones
{
    use SoftDeletes, Slugable, RolTieneRelaciones;

    public $table = 'seg_rol';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'nombre',
        'slug',
        'descripcion',
        'nivel_jerarquia',
        'nivel_acceso',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'nombre' => 'string',
        'slug' => 'string',
        'descripcion' => 'string',
        'nivel_jerarquia' => 'integer',
        'nivel_acceso' => 'string',
        'activo' => 'boolean',
        'borrado' => 'boolean',
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
        'nombre' => 'required|min:3|max:60',
        'slug' => 'required|min:3|max:255',
        'nivel_jerarquia' => 'required|min:1|max:5',
        'nivel_acceso' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'com_cliente_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function org()
    {
        return $this->belongsTo(Org::class, 'com_org_id', 'id');
    }
}
