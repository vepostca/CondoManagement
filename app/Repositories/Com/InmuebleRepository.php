<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Inmueble;
use InfyOm\Generator\Common\BaseRepository;

class InmuebleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'com_division_id',
        'com_tipo_inmueble_id',
        'codigo',
        'nombre',
        'coeficiente',
        'area',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Inmueble::class;
    }
}
