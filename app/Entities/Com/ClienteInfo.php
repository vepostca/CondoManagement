<?php

namespace InnovaCondomi\Entities\Com;

//use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteInfo extends Model
{
    use SoftDeletes;
    public $incrementing = false;
    protected $keyType = 'string';
    public $table = 'com_cliente_info';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'id',
        'com_org_id',
        'com_moneda_id',
        'separador_decimal',
        'num_dec_coeficiente','com_tipo_calculo_cuota_id',
        'activo','created_ip','updated_ip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'separador_decimal' => 'string',
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
        'com_org_id' => 'required',
        'com_moneda_id' => 'required',
        'separador_decimal' => 'required',
        'num_dec_coeficiente' => 'required',
        'com_tipo_calculo_cuota_id' => 'required'
    ];

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
    public function moneda()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\Moneda::class, 'com_moneda_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tipoCalculoCuota()
    {
        return $this->belongsTo(\InnovaCondomi\Entities\Com\TipoCalculoCuota::class, 'com_tipo_calculo_cuota_id', 'id');
    }
}
