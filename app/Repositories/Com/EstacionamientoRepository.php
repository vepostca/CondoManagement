<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Estacionamiento;
use InfyOm\Generator\Common\BaseRepository;

class EstacionamientoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'com_inmueble_id',
        'placa',
        'marca',
        'modelo',
        'color',
        'observaciones',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estacionamiento::class;
    }
}
