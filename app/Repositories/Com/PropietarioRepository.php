<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Propietario;
use InfyOm\Generator\Common\BaseRepository;

class PropietarioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'com_tipo_propietario_id',
        'codigo',
        'cedula_rif',
        'nombres',
        'apellidos',
        'fecha_ingreso',
        'fecha_egreso',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Propietario::class;
    }
}
