<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Descuento;
use InfyOm\Generator\Common\BaseRepository;

class DescuentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'dias_antes_pago',
        'valor',
        'tipo',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Descuento::class;
    }
}
