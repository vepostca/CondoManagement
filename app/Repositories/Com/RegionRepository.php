<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Region;
use InfyOm\Generator\Common\BaseRepository;

class RegionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'com_pais_id',
        'codigo',
        'nombre',
        'siglas',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Region::class;
    }
}
