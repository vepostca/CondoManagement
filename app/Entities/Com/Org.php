<?php

namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Org",
 *      required={"com_cliente_id", "codigo", "nombre", "id_legal"},
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
 *          property="fecha_alta",
 *          description="fecha_alta",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="fecha_baja",
 *          description="fecha_baja",
 *          type="string",
 *          format="date-time"
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
class Org extends Model
{
    use SoftDeletes;
    public $table = 'com_org';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public $fillable = [
        'com_cliente_id',
        'codigo',
        'nombre',
        'id_legal',
        'descripcion',
        'fecha_alta',
        'fecha_baja',
        'activo','borrado',
        'servidor_smtp',
        'cuenta_smtp',
        'pwd_smtp',
        'seguridad_smtp',
        'puerto_smtp',
        'created_ip','updated_ip'
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
        'com_cliente_id' => 'required',
        'codigo' => 'required|min:3|max:10',
        'nombre' => 'required|min:5|max:100',
        'id_legal' => 'required|min:5|max:15',
        'fecha_alta'=> 'required'
    ];

    public function scopeOrgsAccesoEscritura($query)
    {
        if (\Session::has('contextoAp.orgsEscritura')){
            return $query->wherein('id', \Session::get('contextoAp.orgsEscritura'));
        }else{
            return $query->where('id', '-1');
        }
    }

    public function scopeOrgsAccesoLectura($query)
    {
        if (\Session::has('contextoAp.orgsLectura')){
            return $query->wherein('id', \Session::get('contextoAp.orgsLectura'));
        }else{
            return $query->where('id', '-1');
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Cliente::class, 'com_cliente_id', 'id');
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
