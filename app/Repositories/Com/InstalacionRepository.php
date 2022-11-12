<?php

namespace InnovaCondomi\Repositories\Com;

use InnovaCondomi\Entities\Com\Instalacion;
use InfyOm\Generator\Common\BaseRepository;

class InstalacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'com_cliente_id',
        'com_org_id',
        'codigo',
        'nombre',
        'costo',
        'reserva_morosos',
        'com_fondo_id',
        'activo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Instalacion::class;
    }
}
