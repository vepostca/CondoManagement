<?php
namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;

class ContactoWeb extends Model
{
    public $table = 'com_contacto_web';

    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'com_tipo_contacto_web_id',
        'valor',
        'es_principal',
        'notas',
        'contactable_id',
        'contactable_type',
        'activo','borrado','created_ip','updated_ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'valor' => 'string',
        'es_principal' => 'boolean',
        'contactable_id' => 'string',
        'contactable_type' => 'string',
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
        'com_tipo_contacto_web_id' => 'required',
        'valor' => 'required|min:2|max:150',
        'contactable_id_id' => 'required',
        'contactable_id_type' => 'required'
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
    public function tipoContactoWeb()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\TipoContactoWeb::class, 'com_tipo_contacto_web_id', 'id');
    }

    /**
     * Obtener los modelos contactables.
     */
    public function contactable()
    {
        return $this->morphTo();
    }
}
