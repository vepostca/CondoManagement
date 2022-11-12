<?php

namespace InnovaCondomi\Repositories\Seg;

use InnovaCondomi\Entities\Seg\Rol;
use InfyOm\Generator\Common\BaseRepository;

class RolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'nombre',
        'slug',
        'nivel_jerarquia',
        'nivel_acceso',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rol::class;
    }
}
