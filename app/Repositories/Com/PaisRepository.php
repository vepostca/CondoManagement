<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Pais;
use InfyOm\Generator\Common\BaseRepository;

class PaisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'codigo_iso2',
        'codigo_iso3',
        'nombre',
        'codigo_telefonico',
        'tiene_region',
        'nombre_region',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pais::class;
    }
}
