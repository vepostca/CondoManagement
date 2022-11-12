<?php

namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Scopes\ClienteListScope;
use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Cliente",
 *      required={"codigo", "nombre", "id_legal"},
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
 *          property="id_legal",
 *          description="id_legal",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="activo",
 *          description="activo",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="servidor_smtp",
 *          description="servidor_smtp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cuenta_smtp",
 *          description="cuenta_smtp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="pwd_smtp",
 *          description="pwd_smtp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="seguridad_smtp",
 *          description="seguridad_smtp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="puerto_smtp",
 *          description="puerto_smtp",
 *          type="string"
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
class Cliente extends Model
{
    use SoftDeletes;
    public $table = 'com_cliente';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'codigo', 'nombre', 'id_legal', 'descripcion', 'activo', 'borrado',
        'servidor_smtp', 'cuenta_smtp', 'pwd_smtp', 'seguridad_smtp', 'puerto_smtp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo' => 'string',
        'nombre' => 'string',
        'id_legal' => 'string',
        'descripcion' => 'string',
        'activo' => 'boolean',
        'servidor_smtp' => 'string',
        'cuenta_smtp' => 'string',
        'pwd_smtp' => 'string',
        'seguridad_smtp' => 'string',
        'puerto_smtp' => 'string',
        'created_ip' => 'string',
        'updated_ip' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo' => 'required|min:3|max:10',
        'nombre' => 'required|min:5|max:100',
        'id_legal' => 'required|min:5|max:15'
    ];

    public function scopeLogueado($query)
    {
        if (\Session::has('contextoAp.clienteActual.id')){
            return $query->where('id', \Session::get('contextoAp.clienteActual.id'));
        }else{
            return $query;
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function org()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Org::class, 'com_org_id', 'id');
    }

    /**
     * Obtener todas las Direcciones para el Modelo.
     */
    public function direcciones()
    {
        return $this->morphMany('InnovaCondomi\Entities\Com\Direccion','direccionable');
    }

    /**
     * Obtener todas las Direcciones para el Modelo.
     */
    public function telefonos()
    {
        return $this->morphMany('InnovaCondomi\Entities\Com\Telefono','telefoneable');
    }

    /**
     * Obtener todas los Contactos Web para el Modelo.
     */
    public function contactosWeb()
    {
        return $this->morphMany('InnovaCondomi\Entities\Com\ContactoWeb','contactable');
    }
    
}
