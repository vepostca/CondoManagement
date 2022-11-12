<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Org;
use InfyOm\Generator\Common\BaseRepository;

class OrgRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'codigo',
        'nombre',
        'id_legal',
        'fecha_alta',
        'fecha_baja',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Org::class;
    }
}
