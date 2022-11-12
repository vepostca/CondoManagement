<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Fondo;
use InfyOm\Generator\Common\BaseRepository;

class FondoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre',
        'saldo',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Fondo::class;
    }
}
