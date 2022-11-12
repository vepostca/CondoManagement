<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Division;
use InfyOm\Generator\Common\BaseRepository;

class DivisionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Division::class;
    }
}
