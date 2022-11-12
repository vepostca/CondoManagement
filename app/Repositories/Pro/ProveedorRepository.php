<?php

namespace InnovaCondomi\Repositories\Pro;

use InnovaCondomi\Entities\Pro\Proveedor;
use InfyOm\Generator\Common\BaseRepository;

class ProveedorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre',
        'id_legal',
        'siglas',
        'pro_actividad_proveedor_id',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Proveedor::class;
    }
}
