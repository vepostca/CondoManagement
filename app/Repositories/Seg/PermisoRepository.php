<?php

namespace InnovaCondomi\Repositories\Seg;

use InnovaCondomi\Entities\Seg\Permiso;
use InfyOm\Generator\Common\BaseRepository;

class PermisoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'nombre',
        'slug',
        'modelo',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Permiso::class;
    }
}
