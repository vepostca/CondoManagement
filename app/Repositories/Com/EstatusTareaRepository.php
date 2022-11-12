<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\EstatusTarea;
use InfyOm\Generator\Common\BaseRepository;

class EstatusTareaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
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
        return EstatusTarea::class;
    }
}
