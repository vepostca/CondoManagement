<?php
namespace InnovaCondomi\Entities\Com;

use InnovaCondomi\Entities\Base\Identifiable as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recargo
 * @package InnovaCondomi\Entities\Com
 */
class Recargo extends Model
{
    use SoftDeletes;
    public $table = 'com_recargo';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];


    public $fillable = [
        'com_cliente_id',
        'com_org_id',
        'dias_retraso',
        'valor',
        'tipo',
        'activo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'dias_retraso' => 'integer',
        'valor' => 'integer',
        'tipo' => 'string',
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
        'dias_retraso' => 'required',
        'valor' => 'required',
        'tipo' => 'required'
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
