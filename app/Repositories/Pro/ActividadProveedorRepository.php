<?php

namespace InnovaCondomi\Repositories\Pro;

use InnovaCondomi\Entities\Pro\ActividadProveedor;
use InfyOm\Generator\Common\BaseRepository;

class ActividadProveedorRepository extends BaseRepository
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
        return ActividadProveedor::class;
    }
}
