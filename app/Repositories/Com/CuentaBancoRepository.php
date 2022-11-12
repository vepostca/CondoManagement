<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\CuentaBanco;
use InfyOm\Generator\Common\BaseRepository;

class CuentaBancoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre',
        'com_tipo_cuenta_banco_id',
        'com_entidad_bancaria_id',
        'num_cuenta',
        'saldo_inicial',
        'fecha_saldo_inicial',
        'saldo_actual',
        'fecha_saldo_actual',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CuentaBanco::class;
    }
}
